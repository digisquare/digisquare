<?php
App::uses('AppModel', 'Model');

class Tag extends AppModel {

	public $validate = [
		'foreign_key' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'model' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
			],
		],
		'name' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
			],
		],
	];
}
