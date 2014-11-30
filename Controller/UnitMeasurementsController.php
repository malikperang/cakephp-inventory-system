<?php
App::uses('AppController', 'Controller');
/**
 * UnitMeasurements Controller
 *
 * @property UnitMeasurement $UnitMeasurement
 * @property PaginatorComponent $Paginator
 */
class UnitMeasurementsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UnitMeasurement->create();
			if ($this->UnitMeasurement->save($this->request->data)) {
				$this->Session->setFlash(__('The unit measurement has been saved.'),'alert/success');
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The unit measurement could not be saved. Please, try again.'),'alert/error');
			}
		}

		$this->UnitMeasurement->recursive = 0;
		$this->set('unitMeasurements', $this->Paginator->paginate());
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UnitMeasurement->exists($id)) {
			throw new NotFoundException(__('Invalid unit measurement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnitMeasurement->save($this->request->data)) {
				$this->Session->setFlash(__('The unit measurement has been saved.'),'alert/success');
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The unit measurement could not be saved. Please, try again.'),'alert/error');
			}
		} else {
			$options = array('conditions' => array('UnitMeasurement.' . $this->UnitMeasurement->primaryKey => $id));
			$this->request->data = $this->UnitMeasurement->find('first', $options);
		}
		$this->UnitMeasurement->recursive = 0;
		$this->set('unitMeasurements', $this->Paginator->paginate());
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UnitMeasurement->id = $id;
		if (!$this->UnitMeasurement->exists()) {
			throw new NotFoundException(__('Invalid unit measurement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UnitMeasurement->delete()) {
			$this->Session->setFlash(__('The unit measurement has been deleted.'),'alert/success');
		} else {
			$this->Session->setFlash(__('The unit measurement could not be deleted. Please, try again.'),'alert/error');
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * deleteSelected method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function deleteSelected(){
		if($this->request->is('post')){
		if(!isset($this->request->data['UnitMeasurement']['id'])){
			$this->Session->setFlash('No unit selected. please select at least 1 or more unit measurement to be deleted.','alert/error');
			$this->redirect($this->referer());
		}elseif(!empty($this->request->data)) {
	       foreach ($this->request->data['UnitMeasurement']['id'] as $key => $value) {
	       		$this->UnitMeasurement->delete($value);
	       }
	       $this->Session->setFlash(__(count($this->request->data['UnitMeasurement']['id']) . ' ' .'Unit has been deleted.'),'alert/success');

	       $this->redirect($this->referer());
		}else{
   			 $this->Session->setFlash('Please make sure you have any data to delete!','alert/error');
   			 $this->redirect($this->referer());
   			 return false;
   			}
   		}
	}
}
