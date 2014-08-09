<?php
App::uses('AppModel', 'Model');

class Place extends AppModel {

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'zipcode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'country_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'latitude' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitude' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'place_id',
			'dependent' => false,
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
			'foreignKey' => 'place_id',
			'dependent' => false,
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
			'dependent' => false
		),
		// 'Hash' => array(
		// 	'className' => 'Hash',
		// 	'foreignKey' => 'place_id',
		// 	'dependent' => true
		// )
	);

	public function findOrCreate($name) {
		if (empty($name)) {
			return 0;
		}
		// TODO: Essayer de trouver le lieu via un UID (md5 du nom brut ?) stocké en bdd
		$address = $this->extractAddress($name);
		$cleanedUpName = $this->cleanUpName($name);
		try {
			$geocodedPlace = $this->geocode($address);
		} catch (Exception $e) {
			return 0;
		}
		$place = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				'latitude' => $geocodedPlace->getLatitude(),
				'longitude' => $geocodedPlace->getLongitude()
			)
		));
		if ($place) {
			return $place['Place']['id'];
		}
		$place = array(
			'Place' => array(
				'name' => $cleanedUpName,
				'address' => $geocodedPlace->getStreetNumber() . ' ' . $geocodedPlace->getStreetName(),
				'zipcode' => $geocodedPlace->getZipcode(),
				'city' => $geocodedPlace->getCity(),
				'country_code' => $geocodedPlace->getCountryCode(),
				'latitude' => $geocodedPlace->getLatitude(),
				'longitude' => $geocodedPlace->getLongitude(),
			)
		);
		$this->create();
		if ($this->save($place)) {
			return $this->id;
		}
	}

	public function extractAddress($name) {
		// TODO: écrire un test pour le nettoyage des adresses
		$address = stripslashes($name);
		if (preg_match('!\(([^\)]+)\)!', $address, $match)) {
			$address = $match[1];
		}
		$address = preg_replace('/^\p{Z}+|\p{Z}+$/u', '', $address);
		return $address;
	}

	public function cleanUpName($name) {
		// TODO: écrire un test pour le nettoyage des noms
		$name = stripslashes(ucwords($name));
		if (preg_match('!\(([^\)]+)\)!', $name, $match)) {
			$name = str_replace($match[0], '', $name);
		}
		$name = preg_replace('/^\p{Z}+|\p{Z}+$/u', '', $name);
		return $name;
	}

	public function geocode($address) {
		$adapter = new \Geocoder\HttpAdapter\GuzzleHttpAdapter();
		$geocoder = new \Geocoder\Geocoder();
		$geocoder->registerProviders(array(
			new \Geocoder\Provider\NominatimProvider(
				$adapter, 'http://open.mapquestapi.com/nominatim/v1/'
			),
		));
		return $geocoder->geocode($address);
	}

	public function merge($data) {
		$this->Organization->updateAll(
			array('Organization.place_id' => $data['Place']['place_id_1']),
			array('Organization.place_id' => $data['Place']['place_id_2'])
		);
		$this->Event->updateAll(
			array('Event.place_id' => $data['Place']['place_id_1']),
			array('Event.place_id' => $data['Place']['place_id_2'])
		);
		// $this->Hash->updateAll(
		// 	array('Event.place_id' => $place_id_1),
		// 	array('Event.place_id' => $place_id_2)
		// );
		$data['Place']['id'] = $data['Place']['place_id_1'];
		if ($this->save($data)) {
			$this->delete($data['Place']['place_id_2']);
			return true;
		} else {
			return false;
		}
	}
}
