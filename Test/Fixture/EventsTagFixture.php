<?php
/**
 * EventsTagFixture
 *
 */
class EventsTagFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'tag_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'event_id', 'tag_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_events_tags_events1_idx' => array('column' => 'event_id', 'unique' => 0),
			'fk_events_tags_tags1_idx' => array('column' => 'tag_id', 'unique' => 0)
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
			'event_id' => 1,
			'tag_id' => 1
		),
		array(
			'id' => 2,
			'event_id' => 2,
			'tag_id' => 2
		),
		array(
			'id' => 3,
			'event_id' => 3,
			'tag_id' => 3
		),
		array(
			'id' => 4,
			'event_id' => 4,
			'tag_id' => 4
		),
		array(
			'id' => 5,
			'event_id' => 5,
			'tag_id' => 5
		),
		array(
			'id' => 6,
			'event_id' => 6,
			'tag_id' => 6
		),
		array(
			'id' => 7,
			'event_id' => 7,
			'tag_id' => 7
		),
		array(
			'id' => 8,
			'event_id' => 8,
			'tag_id' => 8
		),
		array(
			'id' => 9,
			'event_id' => 9,
			'tag_id' => 9
		),
		array(
			'id' => 10,
			'event_id' => 10,
			'tag_id' => 10
		),
	);

}
