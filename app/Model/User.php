<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),
		),
	);

	public $hasMany = array(
		'Authentication' => array(
			'className' => 'Authentication',
			'foreignKey' => 'user_id',
			'dependent' => true,
		),
		'Participants' => array(
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
		)
	);

	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash(
				$this->data['User']['password']
			);
		}
		return true;
	}

}