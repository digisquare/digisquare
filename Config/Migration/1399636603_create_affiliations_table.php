<?php
class CreateAffiliationsTable extends CakeMigration {

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
				'affiliations' => array(
					'id' => array(
						'type' => 'integer',
						'null' => false,
						'length' => 11,
						'key' => 'primary'),
					'user_id' => array(
						'type' => 'integer',
						'null' => false,
						'length' => 11),
					'model' => array(
						'type' => 'string',
						'null' => false,
						'length' => 255),
					'foreign_key' => array(
						'type' => 'integer',
						'null' => false,
						'length' => 11),
					'status' => array(
						'type' => 'integer',
						'null' => false,
						'length' => 11),
				)
			)
		),
		'down' => array(
			'drop_table' => array(
				'affiliations'
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
