<?php
App::uses('AppController', 'Controller');

class CampaignsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['send']);
	}

	public function send() {
		if (!isset($this->request->query['frequency'])
			|| !isset($this->request->query['edition_id'])
		) {
			throw new NotFoundException(__('Invalid digest'));
		}

		$frequency = (int) $this->request->query['frequency'];
		$edition_id = (int) $this->request->query['edition_id'];

		if (!in_array($frequency, [0, 1])) {
			throw new NotFoundException(__('Not a valid frequency'));
		}

		if (!$this->Campaign->checkFailsafe($frequency, $edition_id)) {
			throw new NotFoundException(__('Please wait to send this digest again'));
		}

		$edition_name = $this->Campaign->Edition->getNameFromId($edition_id);

		$full_date = strtolower(strftime('%A %e %B'));

		$time_type = ($frequency === 0 ? ' - Quotidien - ' : ' - Hebdomadaire - ');
		$time_frame = ($frequency === 0 ? 'aujourd\'hui ' : 'cette semaine du ') . $full_date;
		$time_span = $frequency * 6*24*60*60;

		$upcoming_events = $this->Campaign->Event->findUpcoming($time_span, $edition_id);
		$newly_created_events = $this->Campaign->Event->findNewlyCreated($time_span, $edition_id);

		if (sizeof($upcoming_events) === 0) {
			throw new NotFoundException(__('No upcoming events'));
		}

		$segment = $this->Campaign->makeSegment($frequency, $edition_name);

		if (!$this->Campaign->testSegment($segment)) {
			throw new NotFoundException(__('No subscribers'));
		}

		$content = '<p style="margin-bottom:15px !important;">Voici les évènements à venir ' . $time_frame . ' :</p>';
		$content .= $this->Campaign->formatEvents($upcoming_events);

		$campaign = $this->Campaign->send([
			'title' => $edition_name . $time_type . $full_date,
			'subject' => 'Les évènements du numérique à ' . $edition_name . ' ' . $time_frame,
			'sections' => [
				'sections' => [
					'std_content01' => $content
				]
			],
			'segment' => $segment
		]);

		die;
	}

}
