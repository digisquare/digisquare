<?php
App::uses('EventTag', 'Model');

/**
 * EventTag Test Case
 *
 */
class EventTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventTag = ClassRegistry::init('EventTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventTag);

		parent::tearDown();
	}

}
