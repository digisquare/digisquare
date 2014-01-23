<?php
class OrganizersMigration extends CakeMigration {

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
				'organizers'=> array(
					'id' => array(type => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'event_id' => array(type => 'integer', 'null' => false, 'default' => NULL),
					'organization_id' => array(type => 'integer', 'null' => false, 'default' => NULL),
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
