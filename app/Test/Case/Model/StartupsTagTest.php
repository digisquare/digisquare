<?php
App::uses('StartupsTag', 'Model');

/**
 * StartupsTag Test Case
 *
 */
class StartupsTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.startups_tag',
		'app.startup',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StartupsTag = ClassRegistry::init('StartupsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StartupsTag);

		parent::tearDown();
	}

}
