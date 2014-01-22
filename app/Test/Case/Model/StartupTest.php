<?php
App::uses('Startup', 'Model');

/**
 * Startup Test Case
 *
 */
class StartupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.startup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Startup = ClassRegistry::init('Startup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Startup);

		parent::tearDown();
	}

}
