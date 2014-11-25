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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UnitMeasurement->recursive = 0;
		$this->set('unitMeasurements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UnitMeasurement->exists($id)) {
			throw new NotFoundException(__('Invalid unit measurement'));
		}
		$options = array('conditions' => array('UnitMeasurement.' . $this->UnitMeasurement->primaryKey => $id));
		$this->set('unitMeasurement', $this->UnitMeasurement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UnitMeasurement->create();
			if ($this->UnitMeasurement->save($this->request->data)) {
				$this->Session->setFlash(__('The unit measurement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The unit measurement could not be saved. Please, try again.'));
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
		if (!$this->UnitMeasurement->exists($id)) {
			throw new NotFoundException(__('Invalid unit measurement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnitMeasurement->save($this->request->data)) {
				$this->Session->setFlash(__('The unit measurement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The unit measurement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UnitMeasurement.' . $this->UnitMeasurement->primaryKey => $id));
			$this->request->data = $this->UnitMeasurement->find('first', $options);
		}
		$companies = $this->UnitMeasurement->Company->find('list');
		$users = $this->UnitMeasurement->Company->find('list');
		$this->set(compact('companies', 'users'));
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
			$this->Session->setFlash(__('The unit measurement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The unit measurement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
