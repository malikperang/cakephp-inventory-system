<?php
App::uses('UnitMeasurement', 'Model');

/**
 * UnitMeasurement Test Case
 *
 */
class UnitMeasurementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.unit_measurement',
		'app.user',
		'app.item',
		'app.category',
		'app.stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UnitMeasurement = ClassRegistry::init('UnitMeasurement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UnitMeasurement);

		parent::tearDown();
	}

}
