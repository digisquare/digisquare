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
	);

	public $organizations = ['Coolworking' => 'coolworking', 'Jelly Bordeaux' => 'jellybordeaux', 'Kowork' => 'kowork_bdx',
		'33entrepreneurs' => '33entrepreneurs', 'Auberge Numérique' => 'AubergeAEC', 'Apéro Entrepreneurs' => 'aperopreneurs',
		'Startup Weekend Bordeaux' => 'SWBordeaux', 'Aquinum' => 'aquinum', 'BAUG' => 'BAUG_33',
		'Bordeaux Games' => 'BxGames', 'Bordeaux JUG' => 'BordeauxJUG', 'Giroll' => 'CollectifGiroll',
		'Okiwi' => 'okiwi_fr', 'RubyBDX' => 'rubybdx', 'D&B Talks' => 'dbtalks_org', 'TTFX' => 'TTFXBordeaux',
		'UX Bordeaux' => 'uxbordeaux', 'Bordeaux Entrepreneurs' => 'Bdx_E', 'Mash Up Bordeaux' => 'MU_Bordeaux',
		'Semaine Digitale' => 'semainedigitale', 'ApéroWeb Bordeaux' => 'aperoweb_bdx', 'BordeauxJS' => 'BordeauxJS',
		'Le HUG' => 'hugbdx', 'Darwin eco-système' => 'DarwinBdx', 'Agile Tour Bordeaux' => 'atbdx',
		'Drupal Bordeaux' => 'drupal_bordeaux', 'Coding Goûter Bdx' => 'CodingGouterBdx', 'Bdxcoin' => 'Bdxcoin',
		'Le Campement Bordeaux' => 'Lecampement', 'Délégation TIC Région Aquitaine' => 'NumericAquitN', 'Sthack' => 'sth4ck'
	];


	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Organization']['contacts'])) {
				$results[$key]['Organization']['Contacts'] = json_decode($val['Organization']['contacts'], true);
			}
		}
		return $results;
	}

	public function beforeSave($options = []) {
		if (isset($this->data['Organization']['Contacts']) && is_array($this->data['Organization']['Contacts'])) {
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
			if (isset($twitter_user->entities->url->urls[0]->expanded_url)) {
				$organization['Organization']['Contacts']['website'] = $twitter_user->entities->url->urls[0]->expanded_url;
			}
		} catch (Exception $e) {
		}
		return $organization;
	}

	public function insertAllOrganizations() {
		$id = 1;
		foreach ($this->organizations as $name => $twitter) {
			$organization = [
				'Organization' => [
					'id' => $id,
					'name' => $name,
					'edition_id' => 9,
					'Contacts' => [
						'twitter' => $twitter
					]
				]
			];
			$organizations[] = $this->twitter($organization);
			$id++;
		}
		$this->saveAll($organizations);
		$this->query('ALTER TABLE  `organizations` ORDER BY  `id` ;');
	}

}
