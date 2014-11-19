<?php
App::uses('AppModel', 'Model');
/**
 * Stock Model
 *
 * @property Company $Company
 * @property Item $Item
 * 
 */
class Stock extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'item_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'stock_balance' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		'User'=>array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);

/**
 * check stock method
 *
 * 
 * @param string $item_id,$input_stock
 * @return void
 */

	public function checkStock($stockToOut,$itemID){
			/*
			 * Get current stock balance record
			 */
			$current_stock = $this->find('all',array('fields'=>'stock_balance',
										   'conditions'=>array(
										   			'Stock.item_id'=>$itemID,
										   ),
										   'order'=>array(
										   		'Stock.created'=>'DESC'
										   		),
										   'limit'=>1

										   ));

			/*
    		 * If stock balance is lower than the requested stock,
    		 * return false,
    		 * else return true.
    		 */
			foreach ($current_stock as $stock) {
				if($stockToOut > $stock['Stock']['stock_balance']):
					return FALSE;
				else :
					return TRUE;
				endif;
			
			}

	}

/*
 * Get current stock method
 *
 */
	public function getCurrentStock($item_id){
		$stock = $this->find('all',array(
			'fields'=>array('item_id','stock_balance'),
			'conditions'=>array(
				'Stock.item_id'=>$item_id,
				),
			'order'=>array('Stock.created' => 'DESC'),
			'limit'=>1,
			));

	    return $stock;
	}

}
