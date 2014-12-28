<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'uid' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'edition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'place_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'start_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => true),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'uid', 'edition_id', 'place_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_events_places_idx' => array('column' => 'place_id', 'unique' => 0),
			'fk_events_editions1_idx' => array('column' => 'edition_id', 'unique' => 0)
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
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 1,
			'place_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 1,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 2,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 2,
			'place_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 2,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 3,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 3,
			'place_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 3,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 4,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 4,
			'place_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 4,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 5,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 5,
			'place_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 5,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 6,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 6,
			'place_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 6,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 7,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 7,
			'place_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 7,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 8,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 8,
			'place_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 8,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 9,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 9,
			'place_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 9,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
		array(
			'id' => 10,
			'uid' => 'Lorem ipsum dolor sit amet',
			'edition_id' => 10,
			'place_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_at' => '2014-12-26 01:27:40',
			'end_at' => '2014-12-26 01:27:40',
			'status' => 10,
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-12-26 01:27:40',
			'modified' => '2014-12-26 01:27:40'
		),
	);

}
