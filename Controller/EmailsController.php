<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class EmailsController extends AppController {

	public function digest() {
		if (!isset($this->request->query['frequency'])
			|| !isset($this->request->query['edition_id'])
		) {
			throw new NotFoundException(__('Invalid digest'));
		}

		$frequency = (int) $this->request->query['frequency'];
		$edition_id = (int) $this->request->query['edition_id'];

		$digest = 'digest_' . $frequency . '_' . $edition_id;
		$failsafe = Cache::read($digest);
		if ($failsafe && ($failsafe + 20*60*60) > time()) {
			throw new NotFoundException(__('Please wait to send this digest again'));
		} else {
			Cache::write($digest, time());
		}

		$email = new CakeEmail('mandrill');
		$email->template('digest', 'default');

		if ($frequency === 8) {
			$subject = 'Les évènements du numérique à Bordeaux pour ce ' . strftime('%A %e %B');
			$content = 'aujourd\'hui';
			$time_span = 0;
		} else {
			$subject = 'Les évènements du numérique à Bordeaux pour la semaine ' . date('W');
			$content = 'cette semaine';
			$time_span = 7*24*60*60;
		}

		$this->loadModel('Event');
		$upcoming_events = $this->Event->findUpcoming($time_span, $edition_id);
		$newly_created_events = $this->Event->findNewlyCreated($time_span, $edition_id);

		if (sizeof($upcoming_events) === 0) {
			throw new NotFoundException(__('No upcoming events'));
		}

		$this->loadModel('Setting');
		$subscribers = $this->Setting->findSubscribers($frequency, $edition_id);

		if (sizeof($subscribers) === 0) {
			throw new NotFoundException(__('No subscribers'));
		}

		foreach ($subscribers as $subscriber) {
			$recipients[$subscriber['User']['email']] = $subscriber['User']['Informations']['full_name'];
		}

		$email->to($recipients);
		$email->subject($subject);
		$email->viewVars(compact('upcoming_events', 'newly_created_events', 'content'));

		$result = $email->send('Message');
		die(debug($result));
	}

}
