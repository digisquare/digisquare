<?php
App::uses('Organizer', 'Model');

/**
 * Organizer Test Case
 *
 */
class OrganizerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organizer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Organizer = ClassRegistry::init('Organizer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Organizer);

		parent::tearDown();
	}

}
