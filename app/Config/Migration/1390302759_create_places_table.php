<?php
class CreatePlacesTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
public $description = 'Creates the Places table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
public $migration = array(
	'up' => array(			
		'create_table' => array(
			'places' => array(
				'id' => array(
					'type'    => 'integer',
					'null'    => false,
					'length'  => 11,
					'key'     => 'primary'
				),
				'edition_id' => array(
					'type'    => 'integer',
					'null'    => false,
					'length'  => 11
				),
				'name' => array(
					'type'    => 'string',
					'length'  => 255,
					'null'    => false
				),
				'address' => array(
					'type'    => 'string',
					'length'  => 255,
					'null'    => false
				),
				'zipcode' => array(
					'type'    => 'string',
					'length'  => 5,
					'null'    => false
				),
				'city' => array(
					'type'    => 'string',
					'length'  => 255,
					'null'    => false
				),
				'country_code' => array(
					'type'    => 'string',
					'length'  => 3,
					'null'    => false
				),
				'latitude' => array(
					'type'    => 'float',
					'length'  => 11,
					'null'    => false
				),
				'longitude' => array(
					'type'    => 'float',
					'length'  => 11,
					'null'    => false
				),
				'created' => array(
					'type'    => 'datetime',
					'null'    => false
				),
				'modified' => array(
					'type'    => 'datetime',
					'null'    => false
				),
				'indexes' => array(
					'PRIMARY' => array(
						'column' => 'id',
						'unique' => 1
					)
				)
			)
		)
	),	
	'down' => array(),
);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
public function before($direction) {
	return true;
}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
public function after($direction) {
	return true;
}
}
