<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

   public $uses = array('Item','Stock','User');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','AutoGenerateId');

/**
 * index method
 *
 * @return void
 */
	public function index($status = null) {
		if($status == 'new'){
			$items = $this->Item->getNewItem();
		}else{
			$items = $this->Item->find('all');
			$stocks = $this->Item->Stock->find('list');
			$unitMeasurements = $this->Item->UnitMeasurement->find('list');
		}
		
		
		$this->set(compact('stocks','items','unitMeasurements'));
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
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));

		if($this->request->is('post')){
			$adminEmail = $this->User->findAllByGroupId(1);
			foreach ($adminEmail as $admin) {
				$email = new CakeEmail('smtp');
				$email->from('admin@localhost.com')
					  ->to($admin['User']['email'])
					  ->subject('New Item Alert')
					  ->viewVars(array('item'=>$this->request->data,'sender'=>$userDetails['name']))
					  ->emailFormat('html')
					  ->template('item_alert','alert');

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
			$this->Item->create();
			
			/**
			 * Execute if user did not provide code.
			 * If user didn't supplied the item code,
			 * This script below will execute and will providing
			 * new item code.
			 */
			if(empty($this->request->data['Item']['itemCode'])){
				if($this->Item->checkCode($this->request->data['Item']['itemCode'] == TRUE)){
					$this->request->data['Item']['itemCode'] = strtoupper('AUTO' . $this->AutoGenerateId->randomID());
				}
				$this->request->data['Item']['itemCode'] = strtoupper('AUTO' . $this->AutoGenerateId->randomID());
				
			}

			/**
			 * Execute if provided/generated item code are same as in database.
			 * This query below will check whether the code are exist or not.
			 * If the code exist,it will return true,
			 * else will return false.
			 */

			 $checkCode = $this->Item->checkCode($this->request->data['Item']['itemCode']);
			
			 if($checkCode == TRUE){
			 	
			 	if($this->Item->save($this->request->data)){
			 		$this->Session->setFlash('The item has been saved but you have the same item codes for an item.' ,'alert/error');
			 		$this->redirect($this->referer());
			 	}else{
			 		$this->Session->setFlash('The item could not be saved. Please, try again.','alert/error');
			 		$this->redirect($this->referer());
			 	}
			 	
			 }else{

			 	if($this->Item->save($this->request->data)){
			 		$this->Session->setFlash('The item has been saved.','alert/success');
			 		$this->redirect($this->referer());
			 	}else{
			 		$this->Session->setFlash('The item could not be saved. Please, try again.','alert/error');
			 		$this->redirect($this->referer());
			 	}
			 }
			 
		}
		
		$unitMeasurements = $this->Item->UnitMeasurement->find('list');
		$this->set(compact('users', 'categories', 'unitMeasurements'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$userDetails = $this->Session->read('Auth.User');
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}

		if ($this->request->is('put')) {
			$this->request->data['Item']['id'] = $id;
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'),'alert/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'),'alert/error');
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		
		$unitMeasurements = $this->Item->UnitMeasurement->find('list',array('conditions'=>array()));
		$this->set(compact('users', 'categories', 'unitMeasurements'));
		$this->set('item', $this->Item->find('first', $options));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('The item has been deleted.'),'alert/success');
		} else {
			$this->Session->setFlash(__('The item could not be deleted. Please, try again.'),'alert/error');
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * delete selected method
 *
 * @throws flash
 * @param string $id
 * @return void
 */
	public function deleteSelected(){
		if($this->request->is('post')){
			if(!isset($this->request->data['Item']['id'])):
				$this->Session->setFlash('<i class="cus-cross-octagon-fram"></i> <b>Error!</b> No item selected. please select at least 1 or more items to be deleted.','alert/error');
				$this->redirect($this->referer());
		elseif(!empty($this->request->data)) :
	       foreach ($this->request->data['Item']['id'] as $key => $value) {
	       		$this->Item->delete($value);
	       }
	       $this->Session->setFlash(__(count($this->request->data['Item']['id']) . ' ' .'item has been deleted.'),'alert/success');
	       $this->redirect($this->referer());

   		else:
   			 $this->Session->setFlash('Please make sure you have any data to delete!','alert/error');
   			 $this->redirect($this->referer());
   			 return false;
   		endif;
		}
		
		
	}



}
