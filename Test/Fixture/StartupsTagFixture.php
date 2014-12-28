<?php
/**
 * StartupsTagFixture
 *
 */
class StartupsTagFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'startup_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'tag_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'startup_id', 'tag_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_startups_tags_startups1_idx' => array('column' => 'startup_id', 'unique' => 0),
			'fk_startups_tags_tags1_idx' => array('column' => 'tag_id', 'unique' => 0)
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
			'startup_id' => 1,
			'tag_id' => 1
		),
		array(
			'id' => 2,
			'startup_id' => 2,
			'tag_id' => 2
		),
		array(
			'id' => 3,
			'startup_id' => 3,
			'tag_id' => 3
		),
		array(
			'id' => 4,
			'startup_id' => 4,
			'tag_id' => 4
		),
		array(
			'id' => 5,
			'startup_id' => 5,
			'tag_id' => 5
		),
		array(
			'id' => 6,
			'startup_id' => 6,
			'tag_id' => 6
		),
		array(
			'id' => 7,
			'startup_id' => 7,
			'tag_id' => 7
		),
		array(
			'id' => 8,
			'startup_id' => 8,
			'tag_id' => 8
		),
		array(
			'id' => 9,
			'startup_id' => 9,
			'tag_id' => 9
		),
		array(
			'id' => 10,
			'startup_id' => 10,
			'tag_id' => 10
		),
	);

}
