<?php
App::uses('AppModel', 'Model');

class Edition extends AppModel {

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
		'Startup' => [
			'className' => 'Startup',
			'foreignKey' => 'edition_id',
			'dependent' => true,
		],
		'Affiliation' => [
			'className' => 'Affiliation',
			'foreignKey' => 'foreign_key',
			'order' => 'Affiliation.status ASC',
			'dependent' => true
		]
	];

	public $cities = ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg',
		'Montpellier', 'Bordeaux', 'Lille', 'Rennes', 'Reims', 'Le Havre', 'Saint-Étienne', 'Toulon',
		'Grenoble', 'Dijon', 'Angers', 'Saint-Denis', 'Villeurbanne', 'Nîmes', 'Le Mans', 'Clermont-Ferrand',
		'Aix-en-Provence', 'Brest', 'Limoges', 'Tours', 'Amiens', 'Metz', 'Perpignan'
	];

	public function findBySlug($slug) {
		return $this->find('first', [
			'contain' => false,
			'conditions' => [
				'Edition.slug' => $slug
			]
		]);
	}

	public function reset() {
		$this->deleteAll(['Edition.id >' => 0]);
		$this->Event->deleteAll(['Event.id >' => 0]);
		$this->Event->Place->deleteAll(['Place.id >' => 0]);
		$this->insertAllEditions();
	}

	public function insertAllEditions() {
		foreach ($this->cities as $key => $city) {
			$editions[] = [
				'Edition' => [
					'id' => $key + 1,
					'name' => $city,
					'slug' => strtolower(Inflector::slug($city, '-'))
				]
			];
		}
		$this->saveAll($editions);
		$this->query('ALTER TABLE  `editions` ORDER BY  `id` ;');
	}

}
