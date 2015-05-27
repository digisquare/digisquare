<?php
App::uses('AppModel', 'Model');

class Startup extends AppModel {

	public $actsAs = ['Acl' => ['type' => 'controlled']];

	public $useTable = 'organizations';

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

	public function bindNode($startup) {
		return ['model' => 'Edition', 'foreign_key' => $startup['Startup']['edition_id']];
	}

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['Startup']['edition_id'])) {
			$edition_id = $this->data['Startup']['edition_id'];
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
			if (isset($val['Startup']['contacts'])) {
				$results[$key]['Startup']['Contacts'] = json_decode($val['Startup']['contacts'], true);
			}
		}
		return $results;
	}

	public function beforeSave($options = []) {
		if (isset($this->data['Startup']['Contacts']) && is_array($this->data['Startup']['Contacts'])) {
			$this->data['Startup']['contacts'] = json_encode($this->data['Startup']['Contacts']);
		}
		return true;
	}

}
