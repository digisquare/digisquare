<?php
App::uses('AppModel', 'Model');

class Edition extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'controlled']];

	public $validate = [
		'name' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
		'slug' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
			],
		],
	];

	public $hasMany = [
		'Venue' => [
			'className' => 'Venue',
			'foreignKey' => 'edition_id',
			'dependent' => true,
		],
		'Event' => [
			'className' => 'Event',
			'foreignKey' => 'edition_id',
			'dependent' => true,
		],
		'Organization' => [
			'className' => 'Organization',
			'foreignKey' => 'edition_id',
			'dependent' => true,
		],
	];

	public $cities = ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg',
		'Montpellier', 'Bordeaux', 'Lille', 'Rennes', 'Reims', 'Le Havre', 'Saint-Étienne', 'Toulon',
		'Grenoble', 'Dijon', 'Angers', 'Saint-Denis', 'Villeurbanne', 'Nîmes', 'Le Mans', 'Clermont-Ferrand',
		'Aix-en-Provence', 'Brest', 'Limoges', 'Tours', 'Amiens', 'Metz', 'Perpignan'
	];

	public function parentNode() {
		return 'Editions';
	}

	public function findBySlug($slug) {
		return $this->find('first', [
			'contain' => false,
			'conditions' => [
				'Edition.slug' => $slug
			]
		]);
	}

	public function reset() {
		$this->deleteAll(['Edition.id >' => 0], true, true);

		$this->User = ClassRegistry::init('User');
		$this->User->deleteAll(['User.id >' => 0], true, true);
		$this->User->Group->deleteAll(['Group.id >' => 0], true, true);

		$this->insertAll();
		// $this->Organization->insertAll();
		$this->User->Group->insertAll();
	}

	public function insertAll() {
		foreach ($this->cities as $key => $city) {
			$editions[] = [
				'Edition' => [
					'id' => $key + 1,
					'name' => $city,
					'slug' => strtolower(Inflector::slug($city, '-'))
				]
			];
		}
		$this->saveMany($editions, ['callbacks' => true]);
		$this->query('ALTER TABLE  `editions` ORDER BY  `id` ;');
	}

}
