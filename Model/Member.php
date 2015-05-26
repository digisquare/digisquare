<?php
App::uses('AppModel', 'Model');

class Member extends AppModel {

	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id',
		],
		'Organization' => [
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
		]
	];
}
