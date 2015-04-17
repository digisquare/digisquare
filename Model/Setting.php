<?php
App::uses('AppModel', 'Model');

class Setting extends AppModel {

	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id'
		]
	];

	public function findSubscribers($frequency, $edition_id) {
		$frequency_subscribers = $this->find('list', [
			'fields' => 'user_id',
			'conditions' => [
				'Setting.key' => 'subscription_frequency',
				'Setting.value' => $frequency
			]
		]);
		return $this->find('all', [
			'contain' => ['User'],
			'conditions' => [
				'Setting.user_id' => $frequency_subscribers,
				'Setting.key' => 'subscription_edition_id',
				'Setting.value' => $edition_id
			]
		]);

	}
}
