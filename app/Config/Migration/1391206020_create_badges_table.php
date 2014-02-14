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
	
	
		if ($direction == 'up') { 
 	        /* Add sample badges */
	 	        $Badge = ClassRegistry::init('Badge');
	 	        $Badges = array(	
					array(
						'id' => '1',
						'name' => 'Welcome Badge',
						'type' => 'Edition',
						'minimum' => '0',
						'description' => 'Welcome on digisquare',
						'icon' => 'welcome.png',
						'created' => '2014-01-31 23:58:15',
						'modified' => '2014-01-31 23:58:15'			
					),
					array(
						'id' => '2',
						'name' => 'First event',
						'type' => 'Edition',
						'minimum' => '1',
						'description' => 'Congratulations ! You created your first event, keep it up !',
						'icon' => '1event.png',
						'created' => '2014-01-31 23:58:53',
						'modified' => '2014-01-31 23:58:53'
					),
					array(
						'id' => '3',
						'name' => 'Five events',
						'type' => 'Edition',
						'minimum' => '5',
						'description' => 'Congratulations ! You created your fifth event, keep it up !',
						'icon' => '5events.png',
						'created' => '2014-01-31 23:59:17',
						'modified' => '2014-01-31 23:59:17'
					),
					array(
						'id' => '4',
						'name' => 'First Startup',
						'type' => 'Startup',
						'minimum' => '1',
						'description' => 'Congratulations ! You created your first startup, keep it up !',
						'icon' => '1startup.png',
						'created' => '2014-01-31 23:59:38',
						'modified' => '2014-01-31 23:59:38'
					
					),
					array(
						'id' => '5',
						'name' => 'Five Startups',
						'type' => 'Startup',
						'minimum' => '5',
						'description' => 'Congratulations ! You created your fifth startup, keep it up !',
						'icon' => '5startups.png',
						'created' => '2014-01-31 23:59:57',
						'modified' => '2014-01-31 23:59:57'
					
					),
					array(
						'id' => '6',
						'name' => 'First place',
						'type' => 'Place',
						'minimum' => '1',
						'description' => 'Congratulations, you added your first place ! ',
						'icon' => '1place.png',
						'created' => '2014-02-07 11:41:13',
						'modified' => '2014-02-07 11:41:13'
					),
					array(
						'id' => '7',
						'name' => '5 Places',
						'type' => 'Place',
						'minimum' => '5',
						'description' => 'Congratulations ! You created your fifth place, keep it up ! ',
						'icon' => '5places.png',
						'created' => '2014-02-07 11:41:37',
						'modified' => '2014-02-07 11:41:37'
					),
					array(
						'id' => '8',
						'name' => 'First participation',
						'type' => 'Participant',
						'minimum' => '1',
						'description' => 'Congratulations, you have participated in your first event',
						'icon' => '1participant.png',
						'created' => '2014-02-13 09:51:30',
						'modified' => '2014-02-13 09:51:30'
					
					),
					array(
						'id' => '9',
						'name' => 'Fifth participations',
						'type' => 'Participant',
						'minimum' => '5',
						'description' => 'Huge ! You have participated in five events .',
						'icon' => '5participants.png',
						'created' => '2014-02-13 09:56:04',
						'modified' => '2014-02-13 09:56:04'
					
					)
		 		);
	 
	 	        if ($Badge->saveAll($Badges)){
	 	            //echo "Badges added\n";
	 	        }
	 	        else {
	 		        //echo "Badges not added\n";
	 	        }
	 	}
		return true;
	}
}
