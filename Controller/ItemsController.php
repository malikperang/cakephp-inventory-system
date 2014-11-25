<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

   public $uses = array('Item','Stock');
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
	public function index() {
		$userDetails = $this->Session->read('Auth.User');

		
		$items = $this->Item->find('all');
		$stocks = $this->Item->Stock->find('list');
		$unitMeasurements = $this->Item->UnitMeasurement->find('list');
		//debug($items);
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
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
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
			/*
			/**
			 * Execute if user did not provide code
			 */
			if(empty($this->request->data['Item']['itemCode'])){
				if($this->Item->checkCode($this->request->data['Item']['itemCode'] == TRUE)){
					$this->request->data['Item']['itemCode'] = strtoupper('AUTO' . $this->AutoGenerateId->randomID());
				}
				$this->request->data['Item']['itemCode'] = strtoupper('AUTO' . $this->AutoGenerateId->randomID());
				
			}
			/**
			 * Execute if provided code are same as in database
			 */
			 $checkCode = $this->Item->checkCode($this->request->data['Item']['itemCode']);
			 //debug($checkCode);
			 //exit();
			 if($checkCode == TRUE){
			 	debug($checkCode);
			 	exit();
			 	//echo 'sama code';
			 	if($this->Item->save($this->request->data)){
			 		$this->Session->setFlash('The item has been saved but you have multiple item code. refer #' ,'alert/error');
			 		$this->redirect($this->referer());
			 	}else{
			 		$this->Session->setFlash('The unit measurement could not be saved. Please, try again.','alert/error');
			 		$this->redirect($this->referer());
			 	}
			 	//exit();
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
		$categories = $this->Item->ItemCategory->find('list');
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		
		$categories = $this->Item->Category->find('list');
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
			$this->Session->setFlash(__('The item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item could not be deleted. Please, try again.'));
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
			debug($this->request->data);
		if(!isset($this->request->data['Item']['id'])):
			$this->Session->setFlash('<i class="cus-cross-octagon-fram"></i> <b>Error!</b> No stock selected. please select at least 1 or more stock transaction to be deleted.','alert/error');
			$this->redirect($this->referer());
		elseif(!empty($this->request->data)) :
	       foreach ($this->request->data['Item']['id'] as $key => $value) {
	       		debug($value);
	       		$this->Item->delete($value);
	       }
	       $this->Session->setFlash(__('1 item hase been deleted'));

	       $this->redirect($this->referer());

   		else:
   			 $this->Session->setFlash('Please make sure you have any data to delete!','alert/error');
   			 $this->redirect($this->referer());
   			 return false;
   		endif;
		}
		
		
	}
}
