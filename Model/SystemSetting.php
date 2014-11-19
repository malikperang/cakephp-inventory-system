<?php
App::uses('AppModel', 'Model');
/**
 * SystemSetting Model
 *
 * @property Company $Company
 */
class SystemSetting extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'system_setting_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
