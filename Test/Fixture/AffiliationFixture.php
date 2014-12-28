<?php
/**
 * AffiliationFixture
 *
 */
class AffiliationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'foreign_key' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 1,
			'status' => 1
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 2,
			'status' => 2
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 3,
			'status' => 3
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 4,
			'status' => 4
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 5,
			'status' => 5
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 6,
			'status' => 6
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 7,
			'status' => 7
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 8,
			'status' => 8
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 9,
			'status' => 9
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 10,
			'status' => 10
		),
	);

}
