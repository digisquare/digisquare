<?php
class CreateEventsTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = 'Creates the Events table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'events' => array(
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
					'place_id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'name' => array(
						'type'   => 'string',
						'null'   => false,
						'length' => 255
					),
					'description' => array(
						'null'   => false,
						'type'   => 'text'
					),
					'start_at' => array(
						'null'   => false,
						'type'   => 'datetime'
					),
					'end_at' => array(
						'null'   => false,
						'type'   => 'datetime'
					),
					'status' => array(
						'type' => 'integer',
						'null'   => false,
						'length' => '2'
					),
					'url' => array(
						'type' => 'string',
						'null'   => false,
						'length' => 255
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
				'events'
			),
		),
	);
}
