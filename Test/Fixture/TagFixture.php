<?php
/**
 * TagFixture
 *
 */
class TagFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
	);

}
