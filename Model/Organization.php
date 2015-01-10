<?php
App::uses('AppModel', 'Model');

class Organization extends AppModel {

	public $validate = array(
		'place_id' => array(
			'numeric' => array(
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
			),
		),
		'edition_id' => array(
			'numeric' => array(
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => ['notEmpty'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

	public $belongsTo = array(
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
		),
		'Edition' => array(
			'className' => 'Edition',
			'foreignKey' => 'edition_id',
		)
	);

	public $hasMany = array(
		'Organizer' => array(
			'className' => 'Organizer',
			'foreignKey' => 'organization_id',
			'dependent' => false,
		),
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'organization_id',
			'dependent' => false,
		),
		'Affiliation' => array(
			'className' => 'Affiliation',
			'foreignKey' => 'foreign_key',
			'order' => 'Affiliation.status ASC',
			'dependent' => false
		)
	);

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Organization']['contacts'])) {
				$results[$key]['Organization']['Contacts'] = json_decode($val['Organization']['contacts'], true);
			}
		}
		return $results;
	}

	public function beforeSave($options = []) {
		debug($this->data);
		if (is_array($this->data['Organization']['Contacts'])) {
			$this->data['Organization']['contacts'] = json_encode($this->data['Organization']['Contacts']);
		}
		return true;
	}

	public function twitter($organization) {
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
			$twitter_user = $cb->users_show(['screen_name' => $organization['Organization']['Contacts']['twitter']]);
			$organization['Organization']['avatar'] = $twitter_user->profile_image_url_https;
			$organization['Organization']['description'] = $twitter_user->description;
		} catch (Exception $e) {
		}
		return $organization;
	}

}
