<?php
App::uses('AppModel', 'Model');

class Authentication extends AppModel {

	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'provider' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'uid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
		)
	);

	public function findOrAddUser($auth) {
		$user = $this->findUser($auth);
		if (!$user) {
			$user = $this->addUser($auth);
		}
		return $user;
	}

	public function addCredentials($user_id, $auth) {
		$user = $this->findUser($auth);
		if ($user) {
			return true;
		}
		$authentication['Authentication'] = $this->buildAuthentication($auth);
		$authentication['Authentication']['user_id'] = $user_id;
		$this->create();
		if ($this->save($authentication)) {
			return true;
		} else {
			throw new NotFoundException(__('Invalid user'));
		}
	}

	private function findUser($auth) {
		return $this->find('first', array(
			'contain' => array('User'),
			'conditions' => array(
				'Authentication.provider' => $auth['provider'],
				'Authentication.uid' => $auth['uid'],
			)
		));
	}

	private function addUser($auth) {
		$authentication = $this->buildAuthentication($auth);
		$user = array(
			'User' => array(
				'username' => $auth['info']['nickname'],
				'password' => md5(time()),
			),
			'Authentication' => $authentication,
		);
		$this->create();
		if ($this->saveAssociated($user)) {
			$user['User']['id'] = $this->User->id;
			return $user;
		} else {
			throw new NotFoundException(__('Invalid user'));
		}
	}

	private function buildAuthentication($auth) {
		$authentication = array(
			'provider' => $auth['provider'],
			'uid' => $auth['uid'],
		);
		$fields = array('token', 'secret', 'expires');
		foreach ($fields as $field) {
			if (isset($auth['credentials'][$field])) {
				$authentication[$field] = $auth['credentials'][$field];
			}					
		}
		return $authentication;
	}
}
