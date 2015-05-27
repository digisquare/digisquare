<?php
App::uses('AppModel', 'Model');

class Organization extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'controlled']];

	public $validate = array(
		'venue_id' => array(
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
		'Venue' => array(
			'className' => 'Venue',
			'foreignKey' => 'venue_id',
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
		'Le Campement Bordeaux' => 'Lecampement', 'Délégation TIC Région Aquitaine' => 'NumericAquitN', 'Sthack' => 'sth4ck',
		'La Ruche Bordeaux' => 'LaRucheBordeaux'
	];

	public function bindNode($organization) {
		return ['model' => 'Edition', 'foreign_key' => $organization['Organization']['edition_id']];
	}

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Organization']['edition_id'])) {
			$edition_id = $this->data['Organization']['edition_id'];
		} else {
			$edition_id = $this->field('edition_id');
		}
		if (!$edition_id) {
			return null;
		}
		return ['Edition' => ['id' => $edition_id]];
	}

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

	public function updateEventCount($id = null) {
		if (!$this->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}

		$event_count = $this->Organizer->find('count', [
			'conditions' => ['Organizer.organization_id' => $id]
		]);

		$this->id = $id;
		$this->saveField('event_count', $event_count);

		return $event_count;
	}

	public function twitter($organization, $full = false) {
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
			$organization['Organization']['avatar'] = str_replace('_normal', '_400x400', $twitter_user->profile_image_url_https);
			$organization['Organization']['description'] = $twitter_user->description;
			if (isset($twitter_user->entities->url->urls[0]->expanded_url)) {
				$organization['Organization']['Contacts']['website'] = $twitter_user->entities->url->urls[0]->expanded_url;
			}
			if ($full) {
				$organization['Organization']['name'] = ucwords($twitter_user->name);
			}
		} catch (Exception $e) {
		}
		return $organization;
	}

	public function insertAll() {
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
		$this->saveMany($organizations, ['callbacks' => true]);
		$this->query('ALTER TABLE  `organizations` ORDER BY  `id` ;');
	}

}
