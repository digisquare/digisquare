<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'requester']];

	public $validate = [
		'username' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
			],
		],
		'password' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
			],
		],
		'email' => [
			'email' => [
				'rule' => ['email'],
				'allowEmpty' => true,
			],
		],
	];

	public $belongsTo = [
		'Group' => [
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'counterCache' => true,
		],
	];

	public $hasMany = [
		'Authentication' => [
			'className' => 'Authentication',
			'foreignKey' => 'user_id',
			'dependent' => true,
		],
		'Setting' => [
			'className' => 'Setting',
			'foreignKey' => 'user_id',
			'dependent' => true,
		]
	];

	public function bindNode($user) {
		return ['model' => 'Group', 'foreign_key' => $user['User']['group_id']];
	}

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$group_id = $this->data['User']['group_id'];
		} else {
			$group_id = $this->field('group_id');
		}
		if (!$group_id) {
			return null;
		}
		return ['Group' => ['id' => $group_id]];
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['User']['contacts'])) {
				$results[$key]['User']['Contacts'] = json_decode($val['User']['contacts'], true);
			}
			if (isset($val['User']['informations'])) {
				$results[$key]['User']['Informations'] = json_decode($val['User']['informations'], true);
				$results[$key]['User']['Informations']['full_name'] = @$results[$key]['User']['Informations']['first_name']
					. ' ' . @$results[$key]['User']['Informations']['last_name'];
			}
		}
		return $results;
	}

	public function beforeSave($options = []) {
		if (isset($this->data['User']['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash(
				$this->data['User']['password']
			);
		}
		if (isset($this->data['User']['Contacts']) && is_array($this->data['User']['Contacts'])) {
			$this->data['User']['contacts'] = json_encode($this->data['User']['Contacts']);
		}
		if (isset($this->data['User']['Informations']) && is_array($this->data['User']['Informations'])) {
			$this->data['User']['informations'] = json_encode($this->data['User']['Informations']);
		}
		return true;
	}

	public function twitter($user, $full = false) {
		\Codebird\Codebird::setConsumerKey(
			Configure::read('Opauth.Strategy.Twitter.key'),
			Configure::read('Opauth.Strategy.Twitter.secret')
		);
		$cb = \Codebird\Codebird::getInstance();
		$cb->setToken(
			Configure::read('Opauth.Strategy.Twitter.access_token'),
			Configure::read('Opauth.Strategy.Twitter.token_secret')
		);
		try {
			$twitter_user = $cb->users_show(['screen_name' => $user['User']['Contacts']['twitter']]);
			$user['User']['avatar'] = str_replace('_normal', '_400x400', $twitter_user->profile_image_url_https);
			$user['User']['Informations']['description'] = $twitter_user->description;
			if (isset($twitter_user->entities->url->urls[0]->expanded_url)) {
				$user['User']['Contacts']['website'] = $twitter_user->entities->url->urls[0]->expanded_url;
			}
			if ($full) {
				$user['User']['username'] = $user['User']['Contacts']['twitter'];
				$user['User']['Informations']['first_name'] = ucwords($twitter_user->name);
			}
		} catch (Exception $e) {
		}
		return $user;
	}

}
