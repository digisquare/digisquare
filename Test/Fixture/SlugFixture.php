<?php

class SlugFixture extends CakeTestFixture {

	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'],
		'venue_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'],
		'name' => ['type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'],
		'created' => ['type' => 'datetime', 'null' => false, 'default' => null],
		'modified' => ['type' => 'datetime', 'null' => false, 'default' => null],
		'indexes' => [
			'PRIMARY' => ['column' => ['id', 'venue_id'], 'unique' => 1],
			'id_UNIQUE' => ['column' => 'id', 'unique' => 1],
			'fk_hashes_places1_idx' => ['column' => 'venue_id', 'unique' => 0]
		],
		'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM']
	];

	public $records = [
		[
			'id' => '1',
			'venue_id' => '1',
			'name' => 'le-node-rue-des-faussets-bordeaux-fr',
			'created' => '2015-01-24 20:07:21',
			'modified' => '2015-01-24 20:07:21'
		],
		[
			'id' => '2',
			'venue_id' => '2',
			'name' => 'capc-rue-ferrere-bordeaux-fr',
			'created' => '2015-01-24 20:07:21',
			'modified' => '2015-01-24 20:07:21'
		],
		[
			'id' => '3',
			'venue_id' => '3',
			'name' => 'coolworking-rue-de-conde-bordeaux-fr',
			'created' => '2015-01-24 20:07:22',
			'modified' => '2015-01-24 20:07:22'
		],
		[
			'id' => '4',
			'venue_id' => '4',
			'name' => 'oxford-arms-place-des-martyrs-de-la-resistance-bordeaux-fr',
			'created' => '2015-01-24 20:07:22',
			'modified' => '2015-01-24 20:07:22'
		],
		[
			'id' => '5',
			'venue_id' => '5',
			'name' => 'le-grand-bar-castan-quai-de-la-douane-bordeaux-fr',
			'created' => '2015-01-24 20:07:23',
			'modified' => '2015-01-24 20:07:23'
		],
		[
			'id' => '6',
			'venue_id' => '6',
			'name' => 'the-golden-apple-rue-borie-bordeaux-fr',
			'created' => '2015-01-24 20:07:23',
			'modified' => '2015-01-24 20:07:23'
		],
		[
			'id' => '7',
			'venue_id' => '7',
			'name' => 'the-ramblin-man-quai-richelieu-bordeaux-fr',
			'created' => '2015-01-24 20:07:23',
			'modified' => '2015-01-24 20:07:23'
		],
		[
			'id' => '8',
			'venue_id' => '8',
			'name' => 'the-frog-rosbif-rue-ausone-bordeaux-fr',
			'created' => '2015-01-24 20:07:24',
			'modified' => '2015-01-24 20:07:24'
		],
		[
			'id' => '9',
			'venue_id' => '9',
			'name' => 'yaal-rue-gratiolet-bordeaux-fr',
			'created' => '2015-01-24 20:07:24',
			'modified' => '2015-01-24 20:07:24'
		],
		[
			'id' => '10',
			'venue_id' => '10',
			'name' => 'athenee-municipal-place-saint-christoly-bordeaux-fr',
			'created' => '2015-01-24 20:07:25',
			'modified' => '2015-01-24 20:07:25'
		],
	];

	public $venues = [
		[
			'Venue' => [
				'name' => 'Le Node',
				'address' => '12 Rue Des Faussets',
				'zipcode' => '33000',
				'city' => 'Bordeaux',
				'country_code' => 'FR'
			],
		],
		[
			'Venue' => [
				'name' => 'CAPC',
				'address' => '7 rue Ferrere',
				'zipcode' => '33000',
				'city' => 'Bordeaux',
				'country_code' => 'FR'
			],
		],
		[
			'Venue' => [
				'name' => 'Coolworking',
				'address' => '9 rue de Condé',
				'zipcode' => '33000',
				'city' => 'Bordeaux',
				'country_code' => 'FR'
			],
		],
		[
			'Venue' => [
				'name' => 'Oxford Arms',
				'address' => 'Place des Martyrs de la Résistance',
				'zipcode' => '33000',
				'city' => 'Bordeaux',
				'country_code' => 'FR'
			],
		]
	];
}
