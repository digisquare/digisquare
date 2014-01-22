<?php
App::uses('AppModel', 'Model');
/**
 * StartupsTag Model
 *
 * @property Startup $Startup
 * @property Tag $Tag
 */
class StartupsTag extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Startup' => array(
			'className' => 'Startup',
			'foreignKey' => 'startup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
