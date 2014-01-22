<?php
class MigrationEventTags extends CakeMigration 
{

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

        'event_tags' => array(

                        'id' => array(

              'type' =>'integer',

              'null' => false,

              'length' => 11,

              'key' => 'primary'),
                        
                        'event_id' => array(

              'type' =>'integer',

              'null' => false,

              'length' => 11,

              'key' => 'primary'),
                        
                        'tag_id' => array(

              'type' =>'integer',

              'null' => false,

              'length' => 11,

              'key' => 'primary'),
                        
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