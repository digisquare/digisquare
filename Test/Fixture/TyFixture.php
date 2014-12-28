<?php
/**
 * TyFixture
 *
 */
class TyFixture extends CakeTestFixture {

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
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 2,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 3,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 4,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 5,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 6,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 7,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 8,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 9,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 10,
			'created' => '2014-12-26 01:27:41',
			'modified' => '2014-12-26 01:27:41'
		),
	);

}
