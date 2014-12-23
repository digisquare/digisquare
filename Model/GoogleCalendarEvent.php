<?php
App::uses('AppModel', 'Model');
App::uses('Authentication', 'Model');
App::uses('CakeSession', 'Model/Datasource');

class GoogleCalendarEvent extends AppModel {

	public $useTable = false;

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);

		$this->Client = new Google_Client();
		$this->Authentication = new Authentication();
		$this->Session = new CakeSession();

		$this->Client->setClientId(Configure::read('Opauth.Strategy.Google.client_id'));
		$this->Client->setClientSecret(Configure::read('Opauth.Strategy.Google.client_secret'));

		$google_authentication = $this->Authentication->getByUserAndProvider($this->Session->read('Auth.User.id'), 'Google');
		$token = $this->Authentication->buildGoogleToken($google_authentication);

		$this->Client->refreshToken($token['refresh_token']);
		$this->Authentication->updateGoogleToken($google_authentication, $this->Client->getAccessToken());

		$this->Service = new Google_Service_Calendar($this->Client);
	}

	public function getEvents($calendarId) {
		$params = array('timeMin' => date('c'));
		$gEvents = $this->Service->events->listEvents($calendarId, $params);
		$events = $this->parseGEvents($calendarId, $gEvents);
		return $events;
	}

	public function parseGEvents($calendarId, $gEvents) {
		foreach($gEvents->items as $gEvent) {
			if ($gEvent->status == 'confirmed' && is_array($gEvent->recurrence)) {
				$nextOccurrence = $this->getNextOccurrence($calendarId, $gEvent->id);
				$gEvent = $nextOccurrence->items[0];
			}
			if ($gEvent->status == 'confirmed') {
				$event = $this->formatGEvent($gEvent);
				$events[$event['start_at']]['Event'] = $event;
			}
		}
		ksort($events);
		return $events;
	}

	public function formatGEvent($gEvent) {
		return array(
			'location' => $gEvent->location,
			'uid' => $gEvent->iCalUID,
			'name' => $gEvent->summary,
			'description' => $gEvent->description,
			'start_at' => $gEvent->getStart()->dateTime,
			'end_at' => $gEvent->getEnd()->dateTime,
			'status' => '0',
			'url' => $gEvent->htmlLink
		);
	}

	public function getNextOccurrence($calendarId, $eventId) {
		$params = array('timeMin' => date('c'), 'maxResults' => 1);
		return $this->Service->events->instances($calendarId, $eventId, $params);
	}

}
