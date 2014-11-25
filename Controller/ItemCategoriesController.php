<?php
App::uses('AppController', 'Controller');
/**
 * ItemCategories Controller
 *
 * @property ItemCategory $ItemCategory
 * @property PaginatorComponent $Paginator
 */
class ItemCategoriesController extends AppController {

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
		$this->ItemCategory->recursive = 0;
		$this->set('itemCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ItemCategory->exists($id)) {
			throw new NotFoundException(__('Invalid item category'));
		}
		$options = array('conditions' => array('ItemCategory.' . $this->ItemCategory->primaryKey => $id));
		$this->set('itemCategory', $this->ItemCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ItemCategory->create();
			if ($this->ItemCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The item category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item category could not be saved. Please, try again.'));
			}
		}
		$parentItemCategories = $this->ItemCategory->ParentItemCategory->find('list');
		$this->set(compact('parentItemCategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ItemCategory->exists($id)) {
			throw new NotFoundException(__('Invalid item category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ItemCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The item category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ItemCategory.' . $this->ItemCategory->primaryKey => $id));
			$this->request->data = $this->ItemCategory->find('first', $options);
		}
		$parentItemCategories = $this->ItemCategory->ParentItemCategory->find('list');
		$this->set(compact('parentItemCategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ItemCategory->id = $id;
		if (!$this->ItemCategory->exists()) {
			throw new NotFoundException(__('Invalid item category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ItemCategory->delete()) {
			$this->Session->setFlash(__('The item category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
