<?php
/**
 * MemberFixture
 *
 */
class MemberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'organization_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => array('user_id', 'organization_id'), 'unique' => 1),
			'organization_id' => array('column' => 'organization_id', 'unique' => 0)
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
			'organization_id' => 1
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'organization_id' => 2
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'organization_id' => 3
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'organization_id' => 4
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'organization_id' => 5
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'organization_id' => 6
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'organization_id' => 7
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'organization_id' => 8
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'organization_id' => 9
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'organization_id' => 10
		),
	);

}
