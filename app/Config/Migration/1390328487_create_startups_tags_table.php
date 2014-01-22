<?php
class CreateStartupsTagsTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = 'Creates the StartupsTags table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'startups_tags' => array(
					'id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
						'key'     => 'primary'
					),
					'startup_id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'tag_id' => array(
						'type'    => 'integer',
						'null'    => false,
						'length'  => 11,
					),
					'indexes' => array(
						'PRIMARY' => array(
							'column' => 'id',
							'unique' => 1
						),
					),
				),
			),
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
