<?php
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');
App::uses('Venue', 'Model');

class Eventbrite extends AppModel {

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
				'https://www.eventbriteapi.com/v3/events/' . $id . '/',
				['token' => Configure::read('Opauth.Strategy.Eventbrite.access_token')]
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
		$venue = $this->formatVenue($event->venue, $edition_id);
		$venue_id = $this->Venue->findOrCreate($venue, $edition_id);
		$start = new DateTime($event->start->local, new DateTimeZone($event->start->timezone));
		$end = new DateTime($event->end->local, new DateTimeZone($event->end->timezone));
		return [
			'Event' => [
				'uid' => $event->id . '@eventbrite.fr',
				'edition_id' => $edition_id,
				'venue_id' => $venue_id,
				'name' => $event->name->text,
				'description' => $event->description->text,
				'start_at' => $start->format('Y-m-d H:i:s'),
				'end_at' => $end->format('Y-m-d H:i:s'),
				'status' => '0',
				'url' => $event->url
			]
		];
	}

	public function formatVenue($venue, $edition_id) {
		return [
			'Venue' => [
				'edition_id' => $edition_id,
				'name' => $venue->name,
				'address' => $venue->address->address_1 . ' ' . $venue->address->address_2,
				'zipcode' => $venue->address->postal_code,
				'city' => $venue->address->city,
				'country_code' => $venue->address->country,
				'latitude' => $venue->latitude,
				'longitude' => $venue->longitude
			]
		];
	}

}
