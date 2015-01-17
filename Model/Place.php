<?php
App::uses('AppModel', 'Model');

class Place extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'controlled']];

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'latitude' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'longitude' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
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
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'place_id',
			'dependent' => false,
		),
		'Slug' => array(
			'className' => 'Slug',
			'foreignKey' => 'place_id',
			'dependent' => true
		)
	);

	public $belongsTo = array(
		'Edition' => array(
			'className' => 'Edition',
			'foreignKey' => 'edition_id',
			'counterCache' => true,
		)
	);

	public $fields = ['name', 'address', 'zipcode', 'city', 'country_code'];

	public function bindNode($place) {
		return ['model' => 'Edition', 'foreign_key' => $place['Place']['edition_id']];
	}

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Place']['edition_id'])) {
			$edition_id = $this->data['Place']['edition_id'];
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
			if (isset($val['Place']['name'])) {
				$results[$key]['Place']['oneliner'] = $this->implode($val);
			}
		}
		return $results;
	}

	public function beforeSave($options = array()) {
		if (!empty($this->data['Place']['latitude']) && !empty($this->data['Place']['longitude'])) {
			return true;
		}
		if ($place = $this->geocode($this->data)) {
			$this->data = $place;
		}
		return true;
	}

	public function afterSave($created, $options = array()) {
		$this->Slug->createFromPlace($this->data);
		return true;
	}

	public function findOrCreate($place) {
		if (empty($place)) {
			return false;
		} else if (!is_array($place)) {
			$place = $this->explode($place);
		} else if (1 == sizeof($place['Place']) && isset($place['Place']['name'])) {
			$place = $this->explode($place['Place']['name']);
		}
		$slugPlace = $this->findBySlug($place);
		if (isset($slugPlace['Place']['id'])) {
			return $slugPlace['Place']['id'];
		}
		if ($geocodedPlace = $this->geocode($place)) {
			$place = $geocodedPlace;
			$latLngPlace = $this->findByLatLng($geocodedPlace);
		}
		if (isset($latLngPlace['Place']['id'])) {
			$this->Slug->createFromPlace($latLngPlace);
			return $latLngPlace['Place']['id'];
		}
		$this->create();
		if ($this->save($place)) {
			return $this->id;
		}
		return false;
	}

	public function findBySlug($place) {
		$slug = $this->Slug->slugifyPlace($place);
		return $this->Slug->find('first', array(
			'contain' => array('Place'),
			'conditions' => array('Slug.name' => $slug)
		));
	}

	public function findByLatLng($place) {
		return $this->find('first', array(
			'contain' => false,
			'conditions' => array(
				'latitude' => $place['Place']['latitude'],
				'longitude' => $place['Place']['longitude']
			)
		));
	}

	public function geocode($place) {
		$place_string = $this->implode($place);
		$adapter = new \Geocoder\HttpAdapter\GuzzleHttpAdapter();
		$geocoder = new \Geocoder\Geocoder();
		$geocoder->registerProviders(array(
			new \Geocoder\Provider\GoogleMapsProvider(
				$adapter, 'fr', 'fr', true
			),
			new \Geocoder\Provider\NominatimProvider(
				$adapter, 'http://open.mapquestapi.com/nominatim/v1/'
			),
		));
		try {
			$geocodedPlace = $geocoder->geocode($place_string);
			return $this->decodeAndMerge($place, $geocodedPlace);
		} catch (Exception $e) {
			return false;
		}
	}

	public function decodeAndMerge($place, $geocodedPlace) {
		$decodedGeocodedPlace = [
			'Place' => [
				'address' => $geocodedPlace->getStreetNumber() . ' ' . $geocodedPlace->getStreetName(),
				'zipcode' => $geocodedPlace->getZipcode(),
				'city' => $geocodedPlace->getCity(),
				'country_code' => $geocodedPlace->getCountryCode(),
				'latitude' => str_replace(',', '.', $geocodedPlace->getLatitude()),
				'longitude' => str_replace(',', '.', $geocodedPlace->getLongitude()),
			]
		];
		foreach ($decodedGeocodedPlace['Place'] as $key => $value) {
			if (!empty(trim($value))) {
				$place['Place'][$key] = $value;
			}
		}
		return $place;
	}

	public function implode($place) {
		if (1 == sizeof($place['Place']) && isset($place['Place']['name'])) {
			return $place['Place']['name'];
		}
		foreach ($place['Place'] as $key => $value) {
			if (!in_array($key, $this->fields) || empty($value)) {
				unset($place['Place'][$key]);
			}
		}
		if (isset($place['Place']['zipcode']) && isset($place['Place']['city'])) {
			$place['Place']['city'] = $place['Place']['zipcode'] . ' ' . $place['Place']['city'];
			unset($place['Place']['zipcode']);
		}
		// TODO: convert country to country_code and vice-versa
		if (isset($place['Place']['country_code'])) {
			$place['Place']['country_code'] = substr($place['Place']['country_code'], 0, 2);
		}
		return implode(', ', $place['Place']);
	}

	public function explode($place_string) {
		foreach ($this->fields as $field) {
			$$field = '';
		}

		$place_string = preg_replace('`[\pZ\pC]+`u', ' ', $place_string);
		$place_string = stripslashes($place_string);

		// Extract City Name from Editions list
		$editions = $this->Event->Edition->find('list');
		$words = preg_split('`[\s,]+`', $place_string);
		$city = implode(array_intersect(array_map('strtolower', $editions), array_map('strtolower', $words)));

		// Extract Place Name from "Place Name (Some Other Stuff)"
		if (preg_match('`\(([^\)]+)\)`', $place_string, $match)) {
			$name = str_replace($match[0], '', $place_string);
			$address = $match[1];
		}

		// Extract Place Name from First Segment Split by ", " or " - "
		$segments = preg_split('`(,\s|\s-\s)`', $place_string);
		if (empty(trim($name)) && sizeof($segments) > 1) {
			$name = $segments[0];
		}

		foreach ($segments as $segment) {
			// Extract Address from "12 {rue|avenue|cours} address"
			if (preg_match('`([0-9]+\s[rue|avenue|cours][\p{L}\s]*)`iu', $place_string, $match)) {
				$address = $match[1];
			}			

			// Extract Zipcode and City from "12345 City"
			if (preg_match('`([0-9]{5})\s([a-z]+)`i', $place_string, $match)) {
				$zipcode = $match[1];
				$city = $match[2];
			} else if (preg_match('`([0-9]{5})`', $place_string, $match)) {
				$zipcode = $match[1];
			}
		}

		// Extract Address from Second Segment
		if (empty(trim($address)) && sizeof($segments) > 1) {
			$address = $segments[1];
		}

		// Remove City Name from Address
		if (!empty($city)) {
			$address = str_ireplace($city, '', $address);
		}

		// Extract Place Name by removing everything else
		if (empty(trim($name))) {
			$name = str_ireplace([$address, $zipcode, $city], '', $place_string);
		}

		// Extract Place Name by appending everything else
		if (empty(trim($name))) {
			$name .= empty(trim($address)) ? '' : trim($address) . ', ';
			$name .= empty(trim($city)) ? '' : trim($city) . ', ';
			$name = substr($name, 0, -2);
		}

		$country_code = 'FR';

		foreach ($this->fields as $field) {
			$$field = str_ireplace(['l\'', 'd\''], ['l\' ', 'd\' '], $$field);
			$$field = trim(ucwords($$field));
			$$field = str_ireplace(['L\' ', 'D\' '], ['l\'', 'd\''], $$field);
			$place['Place'][$field] = $$field;
		}
		return $place;
	}

/**
 * Trim unicode whitespace in PHP 5.2
 *
 * @param string $string
 * @return string
 * @link http://stackoverflow.com/questions/4166896/trim-unicode-whitespace-in-php-5-2
 */
	public function trimUnicodeWhitespaces($string) {
		// return preg_replace('/^\p{Z}+|\p{Z}+$/u', '', $string);
		return preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $string);
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
		$this->Slug->updateAll(
			array('Slug.place_id' => $data['Place']['place_id_1']),
			array('Slug.place_id' => $data['Place']['place_id_2'])
		);
		$data['Place']['id'] = $data['Place']['place_id_1'];
		if ($this->save($data)) {
			$this->delete($data['Place']['place_id_2']);
			return true;
		} else {
			return false;
		}
	}
}
