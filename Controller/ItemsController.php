<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Qck');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$userDetails = $this->Session->read('Auth.User');
		//debug($userDetails);
		$items = $this->Item->find('all',array(
			'conditions'=>array('Item.company_id'=>$userDetails['company_id'])
			));
		$this->set('items', $items);
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
			if(empty($this->request->data['Item']['uniqueID']) or $this->request->data['Item']['uniqueID'] == 0){
				$this->request->data['Item']['uniqueID'] = '#'.strtoupper($this->Qck->randomID());
			}
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'),'alert/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'),'alert/error');
			}
		}
		$users = $this->Item->Company->find('list');
		$categories = $this->Item->ItemCategory->find('list');
		$unitMeasurements = $this->Item->UnitMeasurement->find('list',array(
			'conditions'=>array('UnitMeasurement.company_id'=>$userDetails['id'])));
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
		$users = $this->Item->Company->find('list');
		$categories = $this->Item->Category->find('list');
		$unitMeasurements = $this->Item->UnitMeasurement->find('list',array('conditions'=>array('UnitMeasurement.company_id'=>$userDetails['id'])));
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
