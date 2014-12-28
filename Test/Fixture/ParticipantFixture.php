<?php
/**
 * ParticipantFixture
 *
 */
class ParticipantFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'event_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => array('user_id', 'event_id'), 'unique' => 1),
			'event_id' => array('column' => 'event_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'event_id' => 1
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'event_id' => 2
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'event_id' => 3
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'event_id' => 4
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'event_id' => 5
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'event_id' => 6
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'event_id' => 7
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'event_id' => 8
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'event_id' => 9
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'event_id' => 10
		),
	);

}
