<?php
App::uses('ItemCategory', 'Model');

/**
 * ItemCategory Test Case
 *
 */
class ItemCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_category',
		'app.item',
		'app.user',
		'app.category',
		'app.unit_measurement',
		'app.stock',
		'app.stock_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemCategory = ClassRegistry::init('ItemCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemCategory);

		parent::tearDown();
	}

}
