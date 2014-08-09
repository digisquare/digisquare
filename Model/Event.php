<?php
App::uses('AppModel', 'Model');

class Event extends AppModel {

	public $validate = array(
		'edition_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'place_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'start_at' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_at' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'url' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $belongsTo = array(
		'Edition' => array(
			'className' => 'Edition',
			'foreignKey' => 'edition_id',
			'counterCache' => true,
		),
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'counterCache' => true,
		)
	);

	public $hasMany = array(
		'Organizer' => array(
			'className' => 'Organizer',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EventsTag' => array(
			'className' => 'EventsTag',
			'foreignKey' => 'event_id',
			'dependent' => false
		),
		'Affiliation' => array(
			'className' => 'Affiliation',
			'foreignKey' => 'foreign_key',
			'order' => 'Affiliation.status ASC',
			'dependent' => false
		)
	);

	public $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'events_tags',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'tag_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	public function parseVCalendar($vCalendar, $edition_id) {
		foreach($vCalendar->VEVENT as $vEvent) {
			$event = $this->find('first', array(
				'contain' => array(),
				'conditions' => array('Event.uid' => $vEvent->UID)
			));

			if ($event) {
				$event['Event'] = array_merge($event['Event'], $this->format($vEvent, $edition_id));
			} else {
				$event['Event'] = $this->format($vEvent, $edition_id);
			}

			$events[] = $event;

		}

		return $events;
	}

	public function format($vEvent, $edition_id) {
		$location = (string)$vEvent->LOCATION;
		$description = (string)$vEvent->DESCRIPTION;

		$place_id = $this->Place->findOrCreate($location);

		if (!empty($location) && $place_id == 0) {
			$description .= "\r\nLieu : " . $location;
		}

		$event = array(
			'edition_id' => $edition_id,
			'place_id' => $place_id,
			'uid' => (string)$vEvent->UID,
			'name' => (string)$vEvent->SUMMARY,
			'description' => $description,
			'start_at' => (string)$vEvent->DTSTART->getDateTime()->format('Y-m-d H:i:s'),
			'end_at' => (string)$vEvent->DTEND->getDateTime()->format('Y-m-d H:i:s'),
			'status' => '0',
			'url' => (string)$vEvent->URL
		);

		return $event;
	}

}
