<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class EmailsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['digest', 'unsubscribe']);
	}

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
			$tag = 'daily-digest';
			$subject = 'Les évènements du numérique à Bordeaux pour ce ' . strftime('%A %e %B');
			$content = 'aujourd\'hui';
			$time_span = 0;
		} else {
			$tag = 'weekly-digest';
			$subject = 'Les évènements du numérique à Bordeaux pour la semaine ' . date('W');
			$content = 'cette semaine';
			$time_span = 6*24*60*60;
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

			if (empty($subscriber['User']['Informations']['first_name'])) {
				$subscriber['User']['Informations']['first_name'] = $subscriber['User']['username'];
			}

			$unsub_link = h(Router::url(
				[
					'controller' => 'emails',
					'action' => 'unsubscribe',
					'?' => [
						'n' => base64_encode(json_encode($subscriber['Setting']))
					],
				],
				true
			));

			$merge_vars[] = [
				'rcpt' => $subscriber['User']['email'],
				'vars' => [
					[
						'name' => 'name',
						'content' => $subscriber['User']['Informations']['first_name']
					],
					[
						'name' => 'unsublink',
						'content' => $unsub_link
					]
				]
			];
		}

		$email->addHeaders([
		    'tags' => ['digest', $tag],
		    'merge_vars' => $merge_vars,
		]);

		$email->to($recipients);
		$email->subject($subject);
		$email->viewVars(compact('upcoming_events', 'newly_created_events', 'content'));

		$result = $email->send('Message');
		die(debug($result));
	}

	public function unsubscribe() {
		if (!isset($this->request->query['n'])) {
			throw new NotFoundException(__('Page not found'));
		}

		$nonce = $this->request->query['n'];
		$data = json_decode(base64_decode($nonce), true);

		if (!is_array($data)) {
			throw new NotFoundException(__('Invalid link'));
		}

		$this->loadModel('Setting');
		$result = $this->Setting->updateAll(
			['value' => 0],
			[
				'user_id' => $data['user_id'],
				'key' => 'subscription_frequency'
			]
		);

		if ($result) {
			$this->Session->setFlash(__('You have been unsubscribed.'), 'message_success');
		} else {
			$this->Session->setFlash(__('You have not been unsubscribed. Please, try again.'), 'message_error');
		}

		return $this->redirect('/');
	}

}
