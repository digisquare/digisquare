<?php
App::uses('AppController', 'Controller');

class GoogleCalendarEventsController extends AppController {

	public function index() {
		if (isset($this->GoogleCalendarEvent->approval_prompt)) {
			$this->redirect([
				'plugin' => 'Opauth',
				'controller' => 'opauth',
				'action' => 'index',
				'google',
				'?' => [
					'approval_prompt' => 'force'
				]
			]);
		}
		if (!$this->request->query('calendar_id')) {
			$calendars = $this->GoogleCalendarEvent->Service->calendarList->listCalendarList();
			$this->set(compact('calendars'));
		} else {
			$events = $this->GoogleCalendarEvent->getEvents($this->request->query('calendar_id'));
			$this->set(compact('events'));			
		}
	}

}
