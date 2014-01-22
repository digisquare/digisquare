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
						'type'   => 'integer',
						'null'   => false,
						'length' => '11',
						'key'    => 'primary'
					),
					'edition_id' => array(
						'type'   => 'integer',
						'null'   => false,
						'length' => '11'
					),
					'place_id' => array(
						'type'   => 'integer',
						'null'   => false,
						'length' => '11'
					),
					'name' => array(
						'type'   => 'string',
						'null'   => false,
						'length' => '255'
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
						'length' => '255'
					),
					'created' => array(
						'null'   => false,
						'type'   => 'datetime'
					),
					'modified' => array(
						'null'   => false,
						'type'   => 'datetime'
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
		$Events = ClassRegistry::init('Event');
		if ($direction == 'up') { 
			$data = array(
				'Event' => array(
					'id' => '1',
					'edition_id' => '1',
					'place_id' => '1',
					'name' => 'Evenement 1',
					'description' => 'Description de evenement 1...',
					'start_at' => '2014-01-30 00:00:00.000000',
					'end_at' => '2014-01-31 00:00:00.000000',
					'status' => '1',
					'url' => 'http://www.digisquare.com',
					'created' => '2014-01-15 00:00:00.000000',
					'modified' => '2014-01-20 00:00:00.000000'
				),
			);
			$Events->create();
			if ($Events->saveAll($data)) {
				echo "Initialisation des donnees reussies.";
			} else {
				echo "Initialisation des donnees echouees.";
			}
		}
		return true;
	}
}
