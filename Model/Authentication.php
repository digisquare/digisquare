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

	public function addCredentials($user_id, $auth) {
		$user = $this->findUser($auth);
		if ($user) {
			$this->updateAuth($user, $auth);
			return true;
		}
		$authentication['Authentication'] = $this->buildAuthentication($auth);
		$authentication['Authentication']['user_id'] = $user_id;
		$this->create();
		if ($this->save($authentication)) {
			return true;
		} else {
			throw new InternalErrorException(__('Could not add Credentials'));
		}
	}

	public function updateOrCreateUser($auth) {
		$user = $this->findUser($auth);
		if ($user) {
			$this->updateAuth($user, $auth);
		} else {
			$user = $this->createUser($auth);
		}
		return $user;
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

	private function updateAuth($user, $auth) {
		$authentication = $this->buildAuthentication($auth);
		$this->set('id', $user['Authentication']['id']);
		foreach ($authentication as $key => $value) {
			if (isset($user['Authentication'][$key]) && $user['Authentication'][$key] != $value) {
				$this->set($key, $value);
			}
		}
		$this->save();
	}

	private function createUser($auth) {
		$user = array(
			'User' => array(
				'username' => $this->buildUsername($auth),
				'password' => md5(time()),
				'group_id' => 3
			),
			'Authentication' => $this->buildAuthentication($auth),
		);
		$parseProviderInfos = 'parse' . $auth['provider'] . 'Infos';
		$user = $this->{$parseProviderInfos}($auth, $user);
		$this->create();
		if ($this->saveAssociated($user)) {
			$user['User']['id'] = $this->User->id;
			return $user;
		} else {
			throw new InternalErrorException(__('Could not add User'));
		}
	}

	private function buildAuthentication($auth) {
		$authentication = array(
			'provider' => $auth['provider'],
			'uid' => $auth['uid'],
		);
		$fields = array('token', 'secret', 'expires', 'refresh_token');
		foreach ($fields as $field) {
			if (isset($auth['credentials'][$field])) {
				$authentication[$field] = $auth['credentials'][$field];
			}
		}
		return $authentication;
	}

	private function buildUsername($auth) {
		if (isset($auth['info']['username'])) {
			$username = $auth['info']['username'];
		} else if (isset($auth['info']['nickname'])) {
			$username = $auth['info']['nickname'];
		} else if (isset($auth['info']['name'])) {
			$username = strtolower(Inflector::slug($auth['info']['name'], '.'));
		}
		return $username;
	}

	public function getByUserAndProvider($user_id, $provider) {
		$authentication = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				'user_id' => $user_id,
				'provider' => $provider
			)
		));
		if (!$authentication) {
			throw new NotFoundException(__('Invalid authentication'));
		}
		return $authentication;		
	}

	public function buildGoogleToken($authentication) {
		$token = array(
			'access_token' => $authentication['Authentication']['token'],
			'token_type' => 'Bearer',
			'created' => strtotime($authentication['Authentication']['expires']) - 3600,
			'expires_in' => max(strtotime($authentication['Authentication']['expires']) - time(), 0),
			'refresh_token' => $authentication['Authentication']['refresh_token']
		);
		return $token;
	}

	public function updateGoogleToken($authentication, $token) {
		$this->set('id', $authentication['Authentication']['id']);
		$token = json_decode($token);
		$this->set('access_token', $token->access_token);
		$this->set('expires', date('c', $token->created + 3600));
		$this->save();
	}

	public function parseTwitterInfos($auth, $user) {
		$user['User'] += [
			'avatar' => str_replace('_normal', '_400x400', $auth['raw']['profile_image_url_https']),
			'Informations' =>[
				'first_name' => $auth['info']['name'],
				'description' => $auth['info']['description'],
			],
			'Contacts' => [
				'twitter' => $auth['raw']['screen_name'],
				'website' => @$auth['raw']['entities']['url']['urls'][0]['expanded_url'],
			]
		];
		return $user;
	}

	public function parseFacebookInfos($auth, $user) {
		$user['User'] += [
			'avatar' => @str_replace('?type=square', '?width=400&height=400', $auth['info']['image']),
			'Informations' => [
				'first_name' => $auth['info']['first_name'],
				'last_name' => $auth['info']['last_name'],
			],
			'Contacts' => [
				'facebook' => $auth['info']['nickname'],
			]
		];
		return $user;
	}

	public function parseGoogleInfos($auth, $user) {
		$user['User'] += [
			'email' => $auth['info']['email'],
			'avatar' => $auth['info']['image'],
			'Informations' => [
				'first_name' => $auth['info']['first_name'],
				'last_name' => $auth['info']['last_name'],
			]
		];
		return $user;
	}

	public function parseMeetupInfos($auth, $user) {
		return $user;
	}

}
