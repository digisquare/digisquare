<?php
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');
App::uses('Venue', 'Model');

class Facebook extends AppModel {

	public $useTable = false;

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->Venue = new Venue();
	}

	public function importFromUrl($url, $edition_id) {
		if (!preg_match('`[0-9]+`', $url, $matches)) {
			return false;
		};
		$HttpSocket = new HttpSocket(['ssl_verify_host' => false]);
		foreach ($matches as $id) {
			$results = $HttpSocket->get(
				'https://graph.facebook.com/' . $id . '/',
				['access_token' => 
					Configure::read('Opauth.Strategy.Facebook.app_id')
					. '|'
					. Configure::read('Opauth.Strategy.Facebook.app_secret')
				]
			);
			if ($results->isOk()) {
				return $this->formatEvent(
					json_decode($results->body()),
					$edition_id
				);
			}
		}
		return false;
	}

	public function formatEvent($event, $edition_id) {
		$venue = $this->formatVenue($event->location, $event->venue, $edition_id);
		$venue_id = $this->Venue->findOrCreate($venue, $edition_id);
		$start = new DateTime($event->start_time);
		$end = new DateTime($event->end_time);
		return [
			'Event' => [
				'uid' => $event->id . '@facebook.com',
				'edition_id' => $edition_id,
				'venue_id' => $venue_id,
				'name' => $event->name,
				'description' => $event->description,
				'start_at' => $start->format('Y-m-d H:i:s'),
				'end_at' => $end->format('Y-m-d H:i:s'),
				'status' => '0',
				'url' => 'https://www.facebook.com/events/' . $event->id
			]
		];
	}

	public function formatVenue($name, $venue, $edition_id) {
		return [
			'Venue' => [
				'edition_id' => $edition_id,
				'name' => $name,
				'address' => $venue->street,
				'zipcode' => $venue->zip,
				'city' => $venue->city,
				'country_code' => strtoupper(substr($venue->country, 0, 2)),
				'latitude' => $venue->latitude,
				'longitude' => $venue->longitude
			]
		];
	}

}
