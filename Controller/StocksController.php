<?php
App::uses('AppController', 'Controller');

/**
 * Stocks Controller
 *
 * @property Stock $Stock
 * @property PaginatorComponent $Paginator
 */

class StocksController extends AppController{

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$userDetails = $this->Session->read('Auth.User');
		$this->Stock->recursive = 1;

		$this->Paginator->setting = array(
			'conditions'=>array(),
			'limit'=>2,
			'order'=>array(),
			);
		$stocks = $this->Paginator->paginate('Stock');
		$this->set(compact('stocks'));
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		$options = array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id));
		$this->set('stock', $this->Stock->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		$userDetails = $this->Session->read('Auth.User');
		
		
		if ($this->request->is('post')) {
			/*
			 * Trigger new in stock transactions
			 *
			 */
			if($this->request->data['Stock']['operator'] == strtolower('add')){
					
				$this->Stock->create();

				/*
				 * Get current stock
				 */
				$currentStock = $this->Stock->getCurrentStock($this->request->data['Stock']['item_id']);
					
				/*
				 * if current stock is empty,
				 * add new stocks transaction data,
				 * else,
				 * add new stock with current stocks balance
				 */

				if(empty($currentStock)){
					$stockData = array(
								'item_id' => $this->request->data['Stock']['item_id'],
								'stock_in' => $this->request->data['Stock']['stock_transaction'],
								'stock_balance' =>$this->request->data['Stock']['stock_transaction'],
								'stock_status' => 'in',
								);
					$this->Stock->save($stockData);
					$stockID = $this->Stock->getLastInsertID();
					debug($stockID);
					exit(1);
					/*
					 * Get item measurements & items,
					 *
					 */



					$this->setFlash(__($this->request->data['Stock']['stock_transaction'].
						'' . 'has been' 
						));
					unset($stockData);
					
				}
				else{
					foreach ($currentStock as $cStock) {
						//debug($cStock);
						$total = $this->request->data['Stock']['stock_transaction'] + $cStock['Stock']['stock_balance'];
						$stockData = array(
								'item_id' => $this->request->data['Stock']['item_id'],
								'stock_in' => $this->request->data['Stock']['stock_transaction'],
								'stock_balance' => $total,
								'stock_status' => 'in',
								);
						$this->Stock->save($stockData);
						unset($stockData);
					}
				}
			}

			/*
			 * Trigger subtract 
			 *
			 */
			if($this->request->data['Stock']['operator'] == strtolower('minus')){
				$check_stock = $this->Stock->checkStock($this->request->data['Stock']['stock_transaction'],$this->request->data['Stock']['item_id']);
				
				if($check_stock == TRUE){
					$currentStock = $this->Stock->getCurrentStock($this->request->data['Stock']['item_id']);
					
					
					foreach ($currentStock as $cStock) {
						$total = $cStock['Stock']['stock_balance'] - $this->request->data['Stock']['stock_transaction'];

						/*
						 * Get & check items minimum quantity value
						 */
						$this->loadModel('Item');
						$itemMinQty = $this->Item->checkMinQty($this->request->data['Stock']['item_id']);

						$status = '';

						if($total < $itemMinQty['Item']['minimum_qty']){
								$status = "Reached minimum quantity. Item need to restock";
						
						}
						if ($total <= 0 or $total == 0) {
								$status = 'Item out of stock';
						}

						$stockData = array(
									'item_id' => $this->request->data['Stock']['item_id'],
									'stock_out' => $this->request->data['Stock']['stock_transaction'],
	 								'stock_balance' => $total,
									'stock_status' => $status,
									);
						$this->Stock->save($stockData);
					}
				}
				elseif($check_stock == FALSE){
					$this->Session->setFlash(__("Error ! You don't have enough stock to do that operation."),'alert/error');
				}
			}

		}
		//$company = $this->Stock->Company->find('list',array());
		$items = $this->Stock->Item->find('list',array());
		
		$this->set(compact('users', 'items'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stock->save($this->request->data)) {
				$this->Session->setFlash(__('The stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id));
			$this->request->data = $this->Stock->find('first', $options);
		}
		$users = $this->Stock->Company->find('list');
		$items = $this->Stock->Item->find('list');
		$this->set(compact('users', 'items'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Stock->id = $id;
		if (!$this->Stock->exists()) {
			throw new NotFoundException(__('Invalid stock'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Stock->delete()) {
			$this->Session->setFlash(__('The stock has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * delete selected method
 *
 * @throws fkasg
 * @param string $id
 * @return void
 */
	public function deleteSelected(){
		debug($this->request->data);
		if(!isset($this->request->data['Stock']['id'])):
			$this->Session->setFlash('<i class="cus-cross-octagon-fram"></i> <b>Error!</b> No stock selected. please select at least 1 or more stock transaction to be deleted.','alert/error');
			$this->redirect($this->referer());
		elseif(!empty($this->request->data)) :
	       foreach ($this->request->data['Stock']['id'] as $key => $value) {
	       		debug($value);
	       		$this->Stock->delete($value);
	       }
	       $this->Session->setFlash(__('1 Stock has been deleted.'));

	       $this->redirect($this->referer());

   		else:
   			 $this->Session->setFlash('Please make sure you have any data to delete!','alert/error');
   			 $this->redirect($this->referer());
   			 return false;
   		endif;
	}

	//this function are still on construction
  	public function viewPdf($id = null) 
    { 
        if (!$id) 
        { 
            $this->Session->setFlash('Sorry, there was no property ID submitted.'); 
            $this->redirect(array('action'=>'index'), null, true); 
        } 
        Configure::write('debug',0); // Otherwise we cannot use this method while developing 

        $id = intval($id); 

        $property = $this->__view($id); // here the data is pulled from the database and set for the view 

        if (empty($property)) 
        { 
            $this->Session->setFlash('Sorry, there is no property with the submitted ID.'); 
            $this->redirect(array('action'=>'index'), null, true); 
        } 

        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
    }

    public function select_by_date(){
    	$userDetails = $this->Session->read('Auth.User');
    	if($this->request->is('post')){
    		//debug($userDetails);
    		//debug($this->request->data);
    		
    		//date start vars
    		//$m_date_start = $this->request->data['Stock']['date_start']['month'];
    		//$d_date_start = $this->request->data['Stock']['date_start']['day'];
    		//$y_date_start = $this->request->data['Stock']['date_start']['year'];

    		$date_start = strtotime($this->request->data['Stock']['date_start']);
    		$date_start = date('Y-m-d',$date_start);
    		//debug($date_start);
    		//date end vars
    		//$m_date_end = $this->request->data['Stock']['date_end']['month'];
    		//$d_date_end = $this->request->data['Stock']['date_end']['day'];
    		//$y_date_end = $this->request->data['Stock']['date_end']['year'];

    		$date_end = strtotime($this->request->data['Stock']['date_end']);
    		$date_end = date('Y-m-d',$date_end);
    		//exit(1);
    		//query info
    		//select date created from 
    		$findBydate = $this->Stock->find('all',array(
    				//'fields' => array('id','item_id','stock_in','stock_out','stock_balance','stock_status','created'),
    				'conditions' => array(
    					'Stock.company_id' => $userDetails['id'],
    					'and'=>array(
	    					'Stock.created >='=>$date_start,
	    					'Stock.created <='=>$date_end . '23:59:59'))
    			));
    		//$findBydate = $this->Stock->query("SELECT * FROM stocks where DATE(stocks.created) = '2014-03-20'");
    		//debug($findBydate);
    		//var_dump($findBydate);
    		if(empty($findBydate)):
    			$this->Session->setFlash('<b>Alert</b> No data was found with the current input','alert/error');
    		else:
    		$this->set('stocks',$findBydate);
    		endif;
    		//exit(1);

    		$this->loadModel('Item');
			$unitMeasurements = $this->Item->UnitMeasurement->find('list',array(
			'conditions'=>array('UnitMeasurement.company_id'=>$userDetails['id'])));
			$this->set(compact('UnitMeasurements'));
    	}
    } 
    
}
