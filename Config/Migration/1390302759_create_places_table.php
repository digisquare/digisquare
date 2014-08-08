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
						'key'     => 'primary',
					),
					'edition_id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'name' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'address' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'zipcode' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => '5',
					),
					'city' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'country_code' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => '3',
					),
					'latitude' => array(
						'type'    => 'float',
						'length'  => 11,
						'null'    => false,
					),
					'longitude' => array(
						'type'    => 'float',
						'length'  => 11,
						'null'    => false,
					),
					'created' => array(
						'type'    => 'datetime',
						'null'    => false,
					),
					'modified' => array(
						'type'    => 'datetime',
						'null'    => false,
					),
					'indexes' => array(
						'PRIMARY' => array(
							'column' => 'id',
							'unique' => 1
						),
					),
					'tableParameters' => array(
						'charset' => 'utf8',
						'collate' => 'utf8_general_ci',
						'engine' => 'MyISAM'
					),
				),
			),
		),	
		'down' => array(
			'drop_table' => array(
				'places'
			),
		),
	);
}
