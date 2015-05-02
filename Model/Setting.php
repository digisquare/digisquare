<?php
App::uses('AppModel', 'Model');

class Setting extends AppModel {

	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id'
		]
	];

}
