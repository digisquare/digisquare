<?php
App::uses('AppModel', 'Model');

class Venue extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'controlled']];

	public $validate = array(
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
			'foreignKey' => 'venue_id',
			'dependent' => false,
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'venue_id',
			'dependent' => false,
		),
		'Slug' => array(
			'className' => 'Slug',
			'foreignKey' => 'venue_id',
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

	public function bindNode($venue) {
		return ['model' => 'Edition', 'foreign_key' => $venue['Venue']['edition_id']];
	}

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Venue']['edition_id'])) {
			$edition_id = $this->data['Venue']['edition_id'];
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
			if (isset($val['Venue']['name'])) {
				$results[$key]['Venue']['oneliner'] = $this->implode($val);
			} else {
				$results[$key]['Venue']['oneliner'] = null;
			}
		}
		return $results;
	}

	public function beforeSave($options = array()) {
		if (!empty($this->data['Venue']['latitude']) && !empty($this->data['Venue']['longitude'])) {
			return true;
		}
		if ($venue = $this->geocode($this->data)) {
			$this->data = $venue;
		}
		return true;
	}

	public function afterSave($created, $options = array()) {
		$this->Slug->createFromVenue($this->data);
		return true;
	}

	public function findOrCreate($venue) {
		if (empty($venue)) {
			return false;
		} else if (!is_array($venue)) {
			$venue = $this->explode($venue);
		} else if (1 == sizeof($venue['Venue']) && isset($venue['Venue']['name'])) {
			$venue = $this->explode($venue['Venue']['name']);
		}
		$slugVenue = $this->findBySlug($venue);
		if (isset($slugVenue['Venue']['id'])) {
			return $slugVenue['Venue']['id'];
		}
		if ($geocodedVenue = $this->geocode($venue)) {
			$venue = $geocodedVenue;
			$latLngVenue = $this->findByLatLng($geocodedVenue);
		}
		if (isset($latLngVenue['Venue']['id'])) {
			$this->Slug->createFromVenue($latLngVenue);
			return $latLngVenue['Venue']['id'];
		}
		$this->create();
		if ($this->save($venue)) {
			return $this->id;
		}
		return false;
	}

	public function findBySlug($venue) {
		$slug = $this->Slug->slugifyVenue($venue);
		return $this->Slug->find('first', array(
			'contain' => array('Venue'),
			'conditions' => array('Slug.name' => $slug)
		));
	}

	public function findByLatLng($venue) {
		return $this->find('first', array(
			'contain' => false,
			'conditions' => array(
				'latitude' => $venue['Venue']['latitude'],
				'longitude' => $venue['Venue']['longitude']
			)
		));
	}

	public function geocode($venue) {
		$venue_string = $this->implode($venue);
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
			$geocodedVenue = $geocoder->geocode($venue_string);
			return $this->decodeAndMerge($venue, $geocodedVenue);
		} catch (Exception $e) {
			return false;
		}
	}

	public function decodeAndMerge($venue, $geocodedVenue) {
		$decodedGeocodedVenue = [
			'Venue' => [
				'address' => $geocodedVenue->getStreetNumber() . ' ' . $geocodedVenue->getStreetName(),
				'zipcode' => $geocodedVenue->getZipcode(),
				'city' => $geocodedVenue->getCity(),
				'country_code' => $geocodedVenue->getCountryCode(),
				'latitude' => str_replace(',', '.', $geocodedVenue->getLatitude()),
				'longitude' => str_replace(',', '.', $geocodedVenue->getLongitude()),
			]
		];
		foreach ($decodedGeocodedVenue['Venue'] as $key => $value) {
			if (!empty(trim($value))) {
				$venue['Venue'][$key] = $value;
			}
		}
		return $venue;
	}

	public function implode($venue) {
		if (1 == sizeof($venue['Venue']) && isset($venue['Venue']['name'])) {
			return $venue['Venue']['name'];
		}
		foreach ($venue['Venue'] as $key => $value) {
			if (!in_array($key, $this->fields) || empty($value)) {
				unset($venue['Venue'][$key]);
			}
		}
		if (isset($venue['Venue']['zipcode']) && isset($venue['Venue']['city'])) {
			$venue['Venue']['city'] = $venue['Venue']['zipcode'] . ' ' . $venue['Venue']['city'];
			unset($venue['Venue']['zipcode']);
		}
		// TODO: convert country to country_code and vice-versa
		if (isset($venue['Venue']['country_code'])) {
			$venue['Venue']['country_code'] = substr($venue['Venue']['country_code'], 0, 2);
		}
		return implode(', ', $venue['Venue']);
	}

	public function explode($venue_string) {
		foreach ($this->fields as $field) {
			$$field = '';
		}

		$venue_string = preg_replace('`[\pZ\pC]+`u', ' ', $venue_string);
		$venue_string = stripslashes($venue_string);

		// Extract City Name from Editions list
		$editions = $this->Event->Edition->find('list');
		$words = preg_split('`[\s,]+`', $venue_string);
		$city = implode(array_intersect(array_map('strtolower', $editions), array_map('strtolower', $words)));

		// Extract Venue Name from "Venue Name (Some Other Stuff)"
		if (preg_match('`\(([^\)]+)\)`', $venue_string, $match)) {
			$name = str_replace($match[0], '', $venue_string);
			$address = $match[1];
		}

		// Extract Venue Name from First Segment Split by ", " or " - "
		$segments = preg_split('`(,\s|\s-\s)`', $venue_string);
		if (empty(trim($name)) && sizeof($segments) > 1) {
			$name = $segments[0];
		}

		foreach ($segments as $segment) {
			// Extract Address from "12 {rue|avenue|cours} address"
			if (preg_match('`([0-9]+\s[rue|avenue|cours][\p{L}\s]*)`iu', $venue_string, $match)) {
				$address = $match[1];
			}			

			// Extract Zipcode and City from "12345 City"
			if (preg_match('`([0-9]{5})\s([a-z]+)`i', $venue_string, $match)) {
				$zipcode = $match[1];
				$city = $match[2];
			} else if (preg_match('`([0-9]{5})`', $venue_string, $match)) {
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

		// Extract Venue Name by removing everything else
		if (empty(trim($name))) {
			$name = str_ireplace([$address, $zipcode, $city], '', $venue_string);
		}

		// Extract Venue Name by appending everything else
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
			$venue['Venue'][$field] = $$field;
		}
		return $venue;
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
			array('Organization.venue_id' => $data['Venue']['venue_id_1']),
			array('Organization.venue_id' => $data['Venue']['venue_id_2'])
		);
		$this->Event->updateAll(
			array('Event.venue_id' => $data['Venue']['venue_id_1']),
			array('Event.venue_id' => $data['Venue']['venue_id_2'])
		);
		$this->Slug->updateAll(
			array('Slug.venue_id' => $data['Venue']['venue_id_1']),
			array('Slug.venue_id' => $data['Venue']['venue_id_2'])
		);
		$data['Venue']['id'] = $data['Venue']['venue_id_1'];
		if ($this->save($data)) {
			$this->delete($data['Venue']['venue_id_2']);
			return true;
		} else {
			return false;
		}
	}
}
