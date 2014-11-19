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
		'app.company',
		'app.system_setting',
		'app.item_category',
		'app.item',
		'app.unit_measurement',
		'app.item_image',
		'app.stock_status',
		'app.subscription',
		'app.user'
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
