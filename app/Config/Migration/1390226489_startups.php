<?php
class Startups extends CakeMigration {

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
					'startups' => array(
							'id' => array(
							'type' => 'integer',
							'length' => '11'
							),
							'edition_id' => array(
							'type' => 'integer',
							'length' => '11'
							),
							'name' => array(
							'type' => 'string',
							'length' => '255'
							),
							'description' => array(
							'type' => 'text'
							),
							'contacts' => array(
							'type' => 'text'
							),
							'created' => array(
							'type' => 'datetime'
							),
							'modified' => array(
							'type' => 'datetime'
							)
						)
				)
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
