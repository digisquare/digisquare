<?php
/**
 * EditionFixture
 *
 */
class EditionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'event_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true),
		'organization_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true),
		'startup_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1)
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
			'id' => '1',
			'name' => 'Paris',
			'slug' => 'paris',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '2',
			'name' => 'Marseille',
			'slug' => 'marseille',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '3',
			'name' => 'Lyon',
			'slug' => 'lyon',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '4',
			'name' => 'Toulouse',
			'slug' => 'toulouse',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '5',
			'name' => 'Nice',
			'slug' => 'nice',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '6',
			'name' => 'Nantes',
			'slug' => 'nantes',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '7',
			'name' => 'Strasbourg',
			'slug' => 'strasbourg',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '8',
			'name' => 'Montpellier',
			'slug' => 'montpellier',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '9',
			'name' => 'Bordeaux',
			'slug' => 'bordeaux',
			'event_count' => '665',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
		array(
			'id' => '10',
			'name' => 'Lille',
			'slug' => 'lille',
			'event_count' => '0',
			'organization_count' => '0',
			'startup_count' => '0',
			'created' => '2015-01-24 13:35:02',
			'modified' => '2015-01-24 13:35:02'
		),
	);

}
