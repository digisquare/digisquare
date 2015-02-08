<?php
App::uses('Slug', 'Model');

class SlugTest extends CakeTestCase {

	public $fixtures = [
		'app.slug',
	];

	public function setUp() {
		parent::setUp();
		$this->Slug = ClassRegistry::init('Slug');
		$this->slugFixture = new SlugFixture();
	}

	public function tearDown() {
		unset($this->Slug);
		parent::tearDown();
	}

	public function testCreateFromVenue() {
		foreach ($this->slugFixture->venues as $key => $venue) {
			$id = $this->Slug->createFromVenue($venue);
			$this->assertEquals($key + 1, $id);
		}
	}

	public function testSlugifyVenue() {
		foreach ($this->slugFixture->venues as $key => $venue) {
			$slug = $this->Slug->slugifyVenue($venue);
			$expectedSlug = $this->slugFixture->records[$key]['name'];
			$this->assertEquals($expectedSlug, $slug);
		}
	}

}
