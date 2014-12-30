<?php
App::uses('Place', 'Model');

class PlaceTest extends CakeTestCase {

	public $fixtures = array(
		'app.place',
		'app.edition',
		'app.slug',
		'app.event'
	);

	public function setUp() {
		parent::setUp();
		$this->Place = ClassRegistry::init('Place');
		$this->placeFixture = new PlaceFixture();
		$this->Place->Event->Edition->insertAllEditions();
	}

	public function tearDown() {
		unset($this->Place);
		parent::tearDown();
	}

	public function testFindBySlug() {
		$placeWithName['Place'] = $this->placeFixture->records[0];
		$place = $this->Place->findBySlug($placeWithName);
		$this->assertEquals($place['Place']['name'], 'Le Node');
	}

	public function testFindByLatLng() {
		$placeWithLatLng = [
			'Place' => [
				'latitude' => 44.840373,
				'longitude' => -0.570311
			]
		];
		$place = $this->Place->findByLatLng($placeWithLatLng);
		$this->assertEquals($place['Place']['name'], 'Le Node');
	}

	public function testExplode() {
		foreach ($this->placeFixture->places as $place_source => $place_target) {
			$place_result = $this->Place->explode($place_source);
			$this->assertEquals($place_target, $place_result['Place']);
		}
	}

}
