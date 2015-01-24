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
			'dependent' => false,
		],
		'Participant' => [
			'className' => 'Participant',
			'foreignKey' => 'event_id',
			'dependent' => false,
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
		]
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

}
