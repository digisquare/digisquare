<?php
/**
 * OrganizerFixture
 *
 */
class OrganizerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'organization_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'event_id', 'organization_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_events_has_organizations_organizations1_idx' => array('column' => 'organization_id', 'unique' => 0),
			'fk_events_has_organizations_events1_idx' => array('column' => 'event_id', 'unique' => 0)
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
			'organization_id' => 1,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 2,
			'event_id' => 2,
			'organization_id' => 2,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 3,
			'event_id' => 3,
			'organization_id' => 3,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 4,
			'event_id' => 4,
			'organization_id' => 4,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 5,
			'event_id' => 5,
			'organization_id' => 5,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 6,
			'event_id' => 6,
			'organization_id' => 6,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 7,
			'event_id' => 7,
			'organization_id' => 7,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 8,
			'event_id' => 8,
			'organization_id' => 8,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 9,
			'event_id' => 9,
			'organization_id' => 9,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 10,
			'event_id' => 10,
			'organization_id' => 10,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
	);

}
