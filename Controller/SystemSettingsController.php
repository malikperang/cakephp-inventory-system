<?php
App::uses('AppController', 'Controller');
/**
 * SystemSettings Controller
 *
 * @property SystemSetting $SystemSetting
 * @property PaginatorComponent $Paginator
 */
class SystemSettingsController extends AppController {

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
				$this->Session->setFlash(__('The system setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system setting could not be saved. Please, try again.'));
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SystemSetting->save($this->request->data)) {
				$this->Session->setFlash(__('The system setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system setting could not be saved. Please, try again.'));
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
			$this->Session->setFlash(__('The system setting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The system setting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
