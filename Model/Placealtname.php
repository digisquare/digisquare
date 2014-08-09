<?php
App::uses('AppModel', 'Model');

class Placealtname extends AppModel {

	public $belongsTo = array(
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'dependent' => true,
		),
	);

}
