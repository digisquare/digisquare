<?php
App::uses('AppModel', 'Model');

class Event extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'controlled']];

	public $validate = [
		'edition_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
		'venue_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
			],
		],
		'name' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
		'start_at' => [
			'datetime' => [
				'rule' => ['datetime'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
		'end_at' => [
			'datetime' => [
				'rule' => ['datetime'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
		'status' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
	];

	public $belongsTo = [
		'Edition' => [
			'className' => 'Edition',
			'foreignKey' => 'edition_id',
			'counterCache' => true,
		],
		'Venue' => [
			'className' => 'Venue',
			'foreignKey' => 'venue_id',
			'counterCache' => true,
		],
	];

	public $hasMany = [
		'Organizer' => [
			'className' => 'Organizer',
			'foreignKey' => 'event_id',
			'dependent' => true,
		],
		'Hashtag' => [
			'className' => 'Hashtag',
			'foreignKey' => 'foreign_key',
			'conditions' => ['Hashtag.model' => 'Event'],
			'dependent' => true,
		],
	];

	public $hasAndBelongsToMany = [
		'Organization' => [
			'className' => 'Organization',
			'with' => 'Organizer',
			'joinTable' => 'organizers',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'organization_id',
			'unique' => 'keepExisting',
		],
		'Tag' => [
			'className' => 'Tag',
			'with' => 'Hashtag',
			'joinTable' => 'hashtags',
			'foreignKey' => 'foreign_key',
			'associationForeignKey' => 'tag_id',
			'conditions' => ['Hashtag.model' => 'Event'],
		],
	];

	public function bindNode($event) {
		return ['model' => 'Edition', 'foreign_key' => $event['Event']['edition_id']];
	}

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Event']['edition_id'])) {
			$edition_id = $this->data['Event']['edition_id'];
		} else {
			$edition_id = $this->field('edition_id');
		}
		if (!$edition_id) {
			return null;
		}
		return ['Edition' => ['id' => $edition_id]];
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Event']['uid']) && empty($val['Event']['uid'])) {
				$results[$key]['Event']['uid'] = $val['Event']['id'] . '@digisquare.net';
			}
		}
		return $results;
	}

	public function beforeSave($options = array()) {
		$this->unbindModel(['hasAndBelongsToMany' => ['Tag']]);
		return true;
	}

	public function afterSave($created, $options = array()) {
		if (isset($this->data['Tag']['Tag']) && is_array($this->data['Tag']['Tag'])) {
			$this->Hashtag->deleteAll(['model' => 'Event', 'foreign_key' => $this->id]);
			foreach ($this->data['Tag']['Tag'] as $key => $value) {
				$this->Hashtag->create();
				$this->Hashtag->save([
					'model' => 'Event',
					'foreign_key' => $this->data['Event']['id'],
					'tag_id' => $value,
				]);
			}
		}
		return true;
	}

	public function parseVCalendar($vCalendar, $edition_id) {
		foreach($vCalendar->VEVENT as $vEvent) {
			$event = $this->find('first', [
				'contain' => [],
				'conditions' => ['Event.uid' => $vEvent->UID]
			]);
			if ($event) {
				$event['Event'] = array_merge(
					$event['Event'],
					$this->formatVEvent($vEvent, $edition_id)
				);
			} else {
				$event['Event'] = $this->formatVEvent($vEvent, $edition_id);
			}
			$events[] = $event;
		}
		return $events;
	}

	public function formatVEvent($vEvent, $edition_id) {
		$location = (string)$vEvent->LOCATION;
		$description = (string)$vEvent->DESCRIPTION;
		$venue_id = $this->Venue->findOrCreate($location, $edition_id);
		if (!$venue_id) {
			$venue_id = 0;
		}
		if (!empty($location) && $venue_id == 0) {
			$description .= "\r\nLieu : " . $location;
		}
		if ('00:00:00' == $vEvent->DTSTART->getDateTime()->format('H:i:s')) {
			$start_at = strftime('%F 00:00:00', $vEvent->DTSTART->getDateTime()->format('U'));
			$end_at = strftime('%F 00:00:00', ($vEvent->DTEND->getDateTime()->format('U') - 24*60*60));
		} else {
			$start_at = strftime('%F %T', $vEvent->DTSTART->getDateTime()->format('U'));
			$end_at = strftime('%F %T', $vEvent->DTEND->getDateTime()->format('U'));
		}
		return [
			'edition_id' => $edition_id,
			'venue_id' => $venue_id,
			'uid' => (string)$vEvent->UID,
			'name' => (string)$vEvent->SUMMARY,
			'description' => $description,
			'start_at' => $start_at,
			'end_at' => $end_at,
			'status' => '0',
			'url' => (string)$vEvent->URL
		];
	}

	public function findUpcoming($time_span, $edition_id) {
		return $this->find('all', [
			'contain' => ['Edition', 'Venue', 'Organization'],
			'conditions' => [
				'Event.edition_id' => $edition_id,
				'Event.start_at BETWEEN ? AND ?' => [
					date('Y-m-d 00:00:00'),
					date('Y-m-d 23:59:00', time() + $time_span)
				],
			],
			'order' => ['Event.start_at' => 'asc']
		]);
	}

	public function findNewlyCreated($time_span, $edition_id) {
		return $this->find('all', [
			'contain' => ['Edition'],
			'conditions' => [
				'Event.edition_id' => 9,
				'Event.created BETWEEN ? AND ?' => [
					date('Y-m-d 00:00:00', time() - (24*60*60 + $time_span)),
					date('Y-m-d 23:59:00', time())
				],
				'Event.start_at >' => date('Y-m-d 23:59:00', time() + $time_span)
			],
			'order' => ['Event.start_at' => 'asc']
		]);
	}
}
