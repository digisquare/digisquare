<?php
class CreateAuthenticationsTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = 'Creates the Authentications table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'authentications' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'provider' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'uid' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'token' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'secret' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'expires' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => array('id', 'user_id'), 'unique' => 1),
						'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
						'fk_authentications_users1_idx' => array('column' => 'user_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'authentications',
			),
		),
	);
}
