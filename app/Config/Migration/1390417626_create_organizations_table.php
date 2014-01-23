<?php
class CreateOrganizationsTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = 'Creates the Organizations table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'organizations' => array(
					'id' => array(
						'type' => 'integer',
						'null' => false,
						'key' => 'primary'
					),
					'place_id' => array(
						'type' => 'integer',
						'null' => false,
					),
					'edition_id' => array(
						'type' => 'integer',
						'null' => false,
					),
					'name' => array(
						'type' => 'string',
						'null' => false,
						'collate' => 'utf8_general_ci',
						'charset' => 'utf8'
					),
					'descritpion' => array(
						'type' => 'text',
						'null' => false,
						'collate' => 'utf8_general_ci',
						'charset' => 'utf8'
					),
					'created' => array(
						'type' => 'datetime',
						'null' => false,
					),
					'modified' => array(
						'type' => 'datetime',
						'null' => false,
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
				'organizations'
			),
		),
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
