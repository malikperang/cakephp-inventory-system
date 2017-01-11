<?php
App::uses('AppController', 'Controller');
/**
 * SystemSettings Controller
 *
 * @property SystemSetting $SystemSetting
 * @property PaginatorComponent $Paginator
 */
class SystemSettingsController extends AppController {

	public function beforeFilter(){
		
	}

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
			$this->SystemSetting->create();
			if ($this->SystemSetting->save($this->request->data)) {
				$this->Session->setFlash(__('The system setting has been saved.'),'alert/success');
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The system setting could not be saved. Please, try again.'),'alert/error');
			}
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SystemSetting->exists($id)) {
			throw new NotFoundException(__('Invalid system setting'));
		}
		if ($this->request->is('put')) {
			if ($this->SystemSetting->save($this->request->data)) {
				$this->Session->setFlash(__('The system setting has been saved.'),'alert/success');
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The system setting could not be saved. Please, try again.'),'alert/error');
			}
		} else {
			$options = array('conditions' => array('SystemSetting.' . $this->SystemSetting->primaryKey => $id));
			$this->request->data = $this->SystemSetting->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SystemSetting->id = $id;
		if (!$this->SystemSetting->exists()) {
			throw new NotFoundException(__('Invalid system setting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SystemSetting->delete()) {
			$this->Session->setFlash(__('The system setting has been deleted.'),'alert/success');
		} else {
			$this->Session->setFlash(__('The system setting could not be deleted. Please, try again.'),'alert/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
