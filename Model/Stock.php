<?php
App::uses('AppModel', 'Model');
/**
 * Stock Model
 *
 * 
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
		'StockStatus' => array(
			'className' => 'StockStatus',
			'foreignKey' => 'stock_status_id',
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
			$current_stock = $this->find('all',array(
				'fields'=>'stock_balance',
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
/**
 * Check redundant transID
 * 
 */
	public function checkCode($code){
		$stock = $this->find('all',array('conditions'=>array('Stock.transID'=>$code)));
		if(!empty($stock)){
			return TRUE;
		}else{
			return FALSE;
		}
		return $stock;
	}	


/*
 * Get stock balance by Item ID
 *
 */
	public function getStockBalanceBy($item_id){
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

	public function getNewStock(){
		$stocks = $this->find('all',array('conditions'=>array(
			'Stock.stock_status_id'=>1, 
			'DATE(Stock.created) = DATE_SUB(CURDATE(), INTERVAL 0 DAY)'),
			'order'=>array('Stock.created'=>'DESC')));
		return $stocks;
	}
	public function findItemName($item_id){
		$stockname = $this->find('first',array('conditions'=>array('Stock.item_id'=>$item_id)));
		return $stockname;
	}
/*
 * Get stock balance 
 *
 */
	public function getStockBalance(){
		$stock = $this->find('first',array(
			'fields'=>array('stock_balance'),
			'order'=>array('Stock.created' => 'DESC'),
			));

	    return $stock;
	}

/**
 * Count method
 * 
 */

	public function countTotalTrans(){
		$totaltrans = $this->find('count');
		return $totaltrans;
	}
	public function countNewStock(){
		$newstock = $this->find('count',array('conditions'=>array('Stock.stock_status_id'=>1,'DATE(Stock.created) = DATE_SUB(CURDATE(), INTERVAL 0 DAY)')));
		return $newstock;
	}

	
	public function search($transID){
		$result = $this->find('first',array('conditions'=>array('Stock.transID'=>$transID)));
		return $result;
	}
	 
}
