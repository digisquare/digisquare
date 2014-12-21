<?php
App::uses('AppController', 'Controller');

class GoogleCalendarEventsController extends AppController {

	public function index() {
		if (!$this->request->query('calendar_id')) {
			$calendars = $this->GoogleCalendarEvent->Service->calendarList->listCalendarList();
			$this->set(compact('calendars'));
		} else {
			$events = $this->GoogleCalendarEvent->getEvents($this->request->query('calendar_id'));
			$this->set(compact('events'));			
		}
	}

}
