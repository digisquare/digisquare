<?php
App::uses('AppModel', 'Model');

class Organizer extends AppModel {

	public $validate = [
		'event_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
		'organization_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
	];

	public $belongsTo = [
		'Event' => [
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		],
		'Organization' => [
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'counterCache' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
	];

	public function updateRecentEventCount() {
		$organizers = $this->find('all', [
			'fields' => ['COUNT(*) as event_count', 'organization_id'],
			'group' => 'Organizer.organization_id',
			'order' => ['event_count' => 'DESC'],
			'conditions' => [
				'Event.start_at >' => date('Y-m-d 00:00:00', time() - 42*24*60*60)
			]
		]);

		$this->Organization->updateAll(['recent_event_count' => 0]);

		foreach ($organizers as $organizer) {
			$this->Organization->id = $organizer['Organizer']['organization_id'];
			$this->Organization->saveField('recent_event_count', $organizer[0]['event_count'], ['callbacks' => false]);
		}

		return true;
	}
}
