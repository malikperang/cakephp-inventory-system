<?php
App::uses('Stock', 'Model');

/**
 * Stock Test Case
 *
 */
class StockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock',
		'app.item',
		'app.unit_measurement',
		'app.user',
		'app.stock_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stock = ClassRegistry::init('Stock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stock);

		parent::tearDown();
	}

}
