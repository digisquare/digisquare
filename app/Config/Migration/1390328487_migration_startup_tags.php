<?php
class MigrationStartupTags extends CakeMigration {

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
		'up' => array('create_table' => array(

        'startup_tags' => array(

			'id' => array(

              'type'    =>'integer',

              'null'    => false,

              'length'  => 11,

              'key'     => 'primary'),
			  
			'startup_id' => array(

              'type'    =>'integer',

              'null'    => false,

              'length'  => 11,

              'key'     => 'primary'),
			  
			'tag_id' => array(

              'type'    =>'integer',

              'null'    => false,

              'length'  => 11,

              'key'     => 'primary'),
			  
			)
			
		)
		
	)
		
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
