<?php
class CreateMembersTable extends CakeMigration {

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
				'members' => array(
					'id' => array(
						'type' => 'integer', 
						'null' => false, 
						'default' => NULL, 
						'key' => 'primary',
					),
					'user_id' => array(
						'type' => 'integer', 
						'null' => true, 
						'default' => NULL, 
						'key' => 'index',
					),
					'organization_id' => array(
						'type' => 'integer', 
						'null' => true, 
						'default' => NULL, 
						'key' => 'index',
					),
					'indexes' => array(
						'PRIMARY' => array(
							'column' => 'id', 
							'unique' => 1,
						),
						'user_id' => array(
							'column' => array(
								'user_id', 
								'organization_id',
							), 
							'unique' => 1
						),
						'organization_id' => array(
							'column' => 'organization_id', 
							'unique' => 0,
						),
					),
					'tableParameters' => array(
						'charset' => 'utf8', 
						'collate' => 'utf8_general_ci', 
						'engine' => 'MyISAM',
					),
				)
			),
		),
		'down' => array(
			'drop_table' => array(
				'members'
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
