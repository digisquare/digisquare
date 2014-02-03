<?php
class CreateBadgesTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
		'create_table' => array(
				'badges' => array(
					'id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
						'key'     => 'primary',
					),
					'name' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'type' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
					),
					'minimum' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'description' => array(
						'null'    => false,
						'type'    => 'text'
					),
					'icon' => array(
						'type'    => 'string',
						'null'    => false,
						'length'  => 255,
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
					'badges'
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
