<?php
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');
App::uses('Venue', 'Model');

class Meetup extends AppModel {

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
				'https://api.meetup.com/2/events/',
				[
					'event_id' => $id,
					'key' => Configure::read('Opauth.Strategy.Meetup.api_key')
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
		$event = reset($event->results);
		$venue = $this->formatVenue($event->venue, $edition_id);
		$venue_id = $this->Venue->findOrCreate($venue, $edition_id);
		$end = clone $start = new DateTime(
			date('c', $event->time / 1000),
			new DateTimeZone(timezone_name_from_abbr('', $event->utc_offset / 1000, 0))
		);
		$end->modify('+2 hours');
		return [
			'Event' => [
				'uid' => $event->id . '@meetup.com',
				'edition_id' => $edition_id,
				'venue_id' => $venue_id,
				'name' => $event->name,
				'description' => strip_tags(str_replace(['</p>', '<p>'], "\n", $event->description)),
				'start_at' => $start->format('Y-m-d H:i:s'),
				'end_at' => $end->format('Y-m-d H:i:s'),
				'status' => '0',
				'url' => $event->event_url
			]
		];
	}

	public function formatVenue($venue, $edition_id) {
		return [
			'Venue' => [
				'edition_id' => $edition_id,
				'name' => $venue->name,
				'address' => $venue->address_1,
				'zipcode' => null,
				'city' => $venue->city,
				'country_code' => strtoupper($venue->country),
				'latitude' => $venue->lat,
				'longitude' => $venue->lon
			]
		];
	}

}
