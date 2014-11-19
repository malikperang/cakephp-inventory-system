<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 * @property SystemSetting $SystemSetting
 * @property ItemCategory $ItemCategory
 * @property ItemImage $ItemImage
 * @property Item $Item
 * @property StockStatus $StockStatus
 * @property Stock $Stock
 * @property Subscription $Subscription
 * @property UnitMeasurement $UnitMeasurement
 * @property User $User
 */
class Company extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SystemSetting' => array(
			'className' => 'SystemSetting',
			'foreignKey' => 'system_setting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ItemCategory' => array(
			'className' => 'ItemCategory',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ItemImage' => array(
			'className' => 'ItemImage',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
		'Stock' => array(
			'className' => 'Stock',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UnitMeasurement' => array(
			'className' => 'UnitMeasurement',
			'foreignKey' => 'company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'company_id',
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
	

	 public function findCompany(){
	 	$userDetails = Configure::read('Auth.User');
        $company = $this->find("first",array(
        		'conditions'=>array('Company.id'=>$userDetails['company_id']),
        		'limit' => 1,
        	));
        return $company;
    }
}
