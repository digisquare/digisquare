<?php
/**
 * AuthenticationFixture
 *
 */
class AuthenticationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'provider' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'uid' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'token' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'secret' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'expires' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'user_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_authentications_users1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'provider' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'token' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'expires' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
	);

}
