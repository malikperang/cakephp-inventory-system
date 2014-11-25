<?php
App::uses('SystemSetting', 'Model');

/**
 * SystemSetting Test Case
 *
 */
class SystemSettingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.system_setting',
		'app.company',
		'app.item_image',
		'app.item',
		'app.user',
		'app.category',
		'app.unit_measurement',
		'app.stock',
		'app.stock_status',
		'app.subscription'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SystemSetting = ClassRegistry::init('SystemSetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SystemSetting);

		parent::tearDown();
	}

}
