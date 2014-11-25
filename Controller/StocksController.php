<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Stocks Controller
 *
 * @property Stock $Stock
 * @property PaginatorComponent $Paginator
 */

class StocksController extends AppController{

	public $uses = array('Stock','Item','UnitMeasurement','AclManagement.User');



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
		$stocks = $this->Stock->find('all');
		$items  = $this->Stock->Item->find('list');
		$this->set(compact('items','stocks'));
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$userDetails = $this->Session->read('Auth.User');
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		$options = array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id));
		$this->set('stock', $this->Stock->find('first', $options));

		if($this->request->is('post')){
			$adminEmail = $this->User->findAllByGroupId(1);
			foreach ($adminEmail as $admin) {
				$email = new CakeEmail('smtp');
				$email->from('admin@localhost.com')
					  ->to($admin['User']['email'])
					  ->subject('Stock Alert')
					  ->viewVars(array('stock'=>$this->request->data,'sender'=>$userDetails['name']))
					  ->emailFormat('html')
					  ->template('stock_alert','stock_alert');

				if($email->send()){
					$this->Session->setFlash(__('An e-mail has been send to admin.'),'alert/success');
					$this->redirect($this->referer());	  
				}else{
					$this->Session->setFlash(__('The email has not been send. '),'alert/success');
					$this->redirect($this->referer());	
				}		
			}	
			
		}
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		$userDetails = $this->Session->read('Auth.User');
		
		
		if ($this->request->is('post')) {
			//remove '-' character from string
			$this->request->data['Stock']['stock_transaction'] = preg_replace("/[\s-]+/", " ", $this->request->data['Stock']['stock_transaction']);
			/*
			 * Add new stock
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
								'created_by'=>$this->request->data['Stock']['created_by'],
								);
					$this->Stock->save($stockData);
					$stockID = $this->Stock->getLastInsertID();
					//debug($stockID);
					
					/*
					 * Get item measurements & items,
					 *
					 */
						$unitName = $this->UnitMeasurement->findUnitName($itemName['Item']['unit_measurement_id']);
						if(empty($unitName)){
							$unitName['UnitMeasurement']['name'] = '';
						}
						unset($stockData);
						$this->Session->setFlash(__($this->request->data['Stock']['stock_transaction'] . $unitName['UnitMeasurement']['key'] . ' ' . 'of' . ' ' . $itemName['Item']['name'] . ' ' . 'has been added'),'alert/success');
						$this->redirect($this->referer());
					
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
								'created_by'=>$this->request->data['Stock']['created_by']
								);
						$this->Stock->save($stockData);
						
						$itemName = $this->Stock->findItemName($this->request->data['Stock']['item_id']);
						$unitName = $this->UnitMeasurement->findUnitName($itemName['Item']['unit_measurement_id']);
						if(empty($unitName)){
							$unitName['UnitMeasurement']['name'] = '';
						}
						unset($stockData);
						$this->Session->setFlash(__($this->request->data['Stock']['stock_transaction'] . $unitName['UnitMeasurement']['key'] . ' ' . 'of' . ' ' . $itemName['Item']['name'] . ' ' . 'has been added'),'alert/success');
						$this->redirect($this->referer());
					}
				}
			}

			/*
			 * Remove stock
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

						$status = 'out';

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
									'created_by'=>$this->request->data['Stock']['created_by']
									);
						$this->Stock->save($stockData);
						$itemName = $this->Stock->findItemName($this->request->data['Stock']['item_id']);
						$unitName = $this->UnitMeasurement->findUnitName($itemName['Item']['unit_measurement_id']);
						if(empty($unitName)){
							$unitName['UnitMeasurement']['name'] = '';
						}
						$this->Session->setFlash(__($this->request->data['Stock']['stock_transaction'] . $unitName['UnitMeasurement']['key'] . ' ' . 'of' . ' ' .$itemName['Item']['name'] . ' ' . 'has been removed'),'alert/success');
						$this->redirect($this->referer());
					}
				}
				elseif($check_stock == FALSE){
					$this->Session->setFlash(__("You didn't have enough stock to do that operation."),'alert/error');
					$this->redirect($this->referer());

				}
			}

		}
	
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
				$this->Session->setFlash(__('The stock has been saved.'),'alert/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock could not be saved. Please, try again.'),'alert/error');
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
			$this->Session->setFlash(__('The stock has been deleted.'),'alert/success');
		} else {
			$this->Session->setFlash(__('The stock could not be deleted. Please, try again.'),'alert/error');
		}
		return $this->redirect(array('action' => 'index'));
	}/**
 * delete selected method
 *
 * @throws fkasg
 * @param string $id
 * @return void
 */
	public function deleteSelected(){
		//debug($this->request->data);
		if($this->request->is('post')){
		if(!isset($this->request->data['Stock']['id'])){
			$this->Session->setFlash('<i class="cus-cross-octagon-fram"></i> <b>Error!</b> No stock selected. please select at least 1 or more stock transaction to be deleted.','alert/error');
			$this->redirect($this->referer());
		}elseif(!empty($this->request->data)) {
	       foreach ($this->request->data['Stock']['id'] as $key => $value) {
	       		//debug($value);
	       		$this->Stock->delete($value);
	       }
	       $this->Session->setFlash(__( count($this->request->data['Stock']['id']) . ' ' .'Stock has been deleted.'),'alert/success');

	       $this->redirect($this->referer());
		}else{
   			 $this->Session->setFlash('Please make sure you have any data to delete!','alert/error');
   			 $this->redirect($this->referer());
   			 return false;
   			}
   		}
	}

    public function select_by_date(){
    	$userDetails = $this->Session->read('Auth.User');
    	if($this->request->is('post')){
    
    		if(isset($this->request->data['DateRange'])){
	    		$date_start = strtotime($this->request->data['DateRange']['date_start']);
	    		$date_start = date('Y-m-d',$date_start);
	    	

	    		$date_end = strtotime($this->request->data['DateRange']['date_end']);
	    		$date_end = date('Y-m-d',$date_end);
	    	
	    		//select date created from 
	    		$findBydate = $this->Stock->find('all',array(
	    				//'fields' => array('id','item_id','stock_in','stock_out','stock_balance','stock_status','created'),
	    				'conditions' => array(
	    					'and'=>array(
		    					'Stock.created >='=>$date_start,
		    					'Stock.created <='=>$date_end . '23:59:59'))
	    			));
	    		
	    		if(empty($findBydate)){
	    			$this->Session->setFlash('No data was found with the current input','alert/error');
	    		}
	    		else{
	    			$this->set('stocks',$findBydate);
	    		}
    		}

 

    		$this->loadModel('Item');
			$unitMeasurements = $this->Item->UnitMeasurement->find('list',array());
			$this->set(compact('UnitMeasurements'));
    	}
    } 
    
}
