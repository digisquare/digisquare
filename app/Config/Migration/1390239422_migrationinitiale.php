<?php
class MigrationInitiale extends CakeMigration {

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
				'users'=> array(
					'id' => array(type => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
					'username' => array(type => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
					'password' => array(type => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
					'email' => array(type => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
					'created' => array(type => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array(type => 'datetime', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
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
