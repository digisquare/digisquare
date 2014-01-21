<?php
App::uses('StartupTag', 'Model');

/**
 * StartupTag Test Case
 *
 */
class StartupTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.startup_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StartupTag = ClassRegistry::init('StartupTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StartupTag);

		parent::tearDown();
	}

}
