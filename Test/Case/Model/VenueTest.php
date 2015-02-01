<?php
App::uses('Venue', 'Model');

class VenueTest extends CakeTestCase {

	public $fixtures = array(
		'app.venue',
		'app.edition',
		'app.slug',
		'app.event'
	);

	public function setUp() {
		parent::setUp();
		$this->Venue = ClassRegistry::init('Venue');
		$this->venueFixture = new VenueFixture();
		$this->Venue->Event->Edition->insertAll();
	}

	public function tearDown() {
		unset($this->Venue);
		parent::tearDown();
	}

	public function testFindBySlug() {
		$venueWithName['Venue'] = $this->venueFixture->records[0];
		$venue = $this->Venue->findBySlug($venueWithName);
		$this->assertEquals($venue['Venue']['name'], 'Le Node');
	}

	public function testFindByLatLng() {
		$venueWithLatLng = [
			'Venue' => [
				'latitude' => 44.84037342,
				'longitude' => -0.57031142
			]
		];
		$venue = $this->Venue->findByLatLng($venueWithLatLng);
		$this->assertEquals($venue['Venue']['name'], 'Le Node');
	}

	public function testImplodeWithName() {
		foreach ($this->venueFixture->venues as $source => $target) {
			$venue['Venue']['name'] = $target['name'];
			$result = $this->Venue->implode($venue);
			$this->assertEquals($result, $target['name']);
		}		
	}

	public function testExplode() {
		foreach ($this->venueFixture->venues as $source => $target) {
			$result = $this->Venue->explode($source);
			$this->assertEquals($result['Venue'], $target);
		}
	}

}
