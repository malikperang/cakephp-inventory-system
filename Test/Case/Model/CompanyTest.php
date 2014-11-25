<?php
App::uses('Company', 'Model');

/**
 * Company Test Case
 *
 */
class CompanyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company',
		'app.image',
		'app.user',
		'app.item',
		'app.category',
		'app.unit_measurement',
		'app.stock',
		'app.stock_status',
		'app.setting',
		'app.subscription'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Company = ClassRegistry::init('Company');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Company);

		parent::tearDown();
	}

}
