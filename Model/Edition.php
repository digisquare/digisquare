<?php
App::uses('AppModel', 'Model');

class Edition extends AppModel {

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'edition_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'edition_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Startup' => array(
			'className' => 'Startup',
			'foreignKey' => 'edition_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Affiliation' => array(
			'className' => 'Affiliation',
			'foreignKey' => 'foreign_key',
			'order' => 'Affiliation.status ASC',
			'dependent' => true
		)
	);

	public $cities = ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg',
		'Montpellier', 'Bordeaux', 'Lille', 'Rennes', 'Reims', 'Le Havre', 'Saint-Étienne', 'Toulon',
		'Grenoble', 'Dijon', 'Angers', 'Saint-Denis', 'Villeurbanne', 'Nîmes', 'Le Mans', 'Clermont-Ferrand',
		'Aix-en-Provence', 'Brest', 'Limoges', 'Tours', 'Amiens', 'Metz', 'Perpignan'
	];

	public function reset() {
		$this->deleteAll(array('Edition.id >' => 0));
		$this->Event->deleteAll(array('Event.id >' => 0));
		$this->Event->Place->deleteAll(array('Place.id >' => 0));
		$this->insertAllEditions();
	}

	public function insertAllEditions() {
		foreach ($this->cities as $key => $city) {
			$editions[] = array(
				'Edition' => array(
					'id' => $key + 1,
					'name' => $city,
					'slug' => strtolower(Inflector::slug($city, '-'))
				)
			);
		}
		$this->saveAll($editions);
		$this->query('ALTER TABLE  `editions` ORDER BY  `id` ;');
	}
}
