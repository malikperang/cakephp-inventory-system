<?php
App::uses('ItemImage', 'Model');

/**
 * ItemImage Test Case
 *
 */
class ItemImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_image',
		'app.company',
		'app.item',
		'app.user',
		'app.category',
		'app.unit_measurement',
		'app.stock',
		'app.stock_status',
		'app.subscription',
		'app.system_setting'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemImage = ClassRegistry::init('ItemImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemImage);

		parent::tearDown();
	}

}
