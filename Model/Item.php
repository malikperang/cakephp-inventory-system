<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Company $Company
 * @property ItemCategory $ItemCategory
 * @property UnitMeasurement $UnitMeasurement
 * @property ItemImage $ItemImage
 * @property Stock $Stock
 */
class Item extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'minimum_qty' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'maximum_qty' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'UnitMeasurement' => array(
			'className' => 'UnitMeasurement',
			'foreignKey' => 'unit_measurement_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' =>'',
			'fields' => '',
			'order' => ''
		),
		'StockStatus' => array(
			'className' => 'StockStatus',
			'foreignKey' => 'stock_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Stock' => array(
			'className' => 'Stock',
			'foreignKey' => 'item_id',
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

	public function checkMaxQty($itemID){
		$items = $this->find('first',array('conditions'=> array('Item.id' => $itemID)));
		return $items;
	}


	public function checkMinQty($itemID){
		$items = $this->find('first',array('conditions'=> array('Item.id' => $itemID)));
		return $items;
	}

	public function checkCode($code){
		$items = $this->find('all',array('conditions'=>array('Item.itemCode'=>$code)));
		if(!empty($items)){
			return TRUE;
		}else{
			return FALSE;
		}
		return $items;
	}	

	public function findTotalItem(){
		$items = $this->find('count',array());
		return $items;
	}

	public function getNewItem(){
		$items = $this->find('all',array('conditions'=>array('DATE(Item.created) = DATE_SUB(CURDATE(), INTERVAL 0 DAY)')));
		return $items;
	}

	public function countOutStock(){
		$stock = $this->find('count',array('conditions'=>array('Item.stock_status_id'=>4),'order'=>array('DATE(CURDATE())'=>'DESC')));
		return $stock;
	}

}
