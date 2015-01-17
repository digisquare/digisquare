<?php
App::uses('Group', 'Model');

/**
 * Group Test Case
 *
 */
class GroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group',
		'app.user',
		'app.authentication',
		'app.participant',
		'app.event',
		'app.edition',
		'app.organization',
		'app.place',
		'app.affiliation',
		'app.slug',
		'app.organizer',
		'app.member',
		'app.startup',
		'app.tag',
		'app.events_tag',
		'app.startups_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Group = ClassRegistry::init('Group');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}

}
