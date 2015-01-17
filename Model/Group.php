<?php
App::uses('AppModel', 'Model');

class Group extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'requester']];

	public $validate = [
		'name' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
			],
		],
	];

	public $hasMany = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => false,
		]
	];

	public $groups = [
		'1' => 'admins',
		'2' => 'mods',
		'3' => 'users'
	];

	public function parentNode() {
		return null;
	}

	public function insertAll() {
		foreach ($this->groups as $key => $group) {
			$groups[] = [
				'Group' => [
					'id' => $key,
					'name' => $group,
				]
			];
		}
		$this->saveMany($groups, ['callbacks' => true]);
		$this->query('ALTER TABLE  `groups` ORDER BY  `id` ;');
	}

}
