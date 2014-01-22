<?php
App::uses('Organization', 'Model');

/**
 * Organization Test Case
 *
 */
class OrganizationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Organization = ClassRegistry::init('Organization');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Organization);

		parent::tearDown();
	}

}
