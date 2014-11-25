<?php
App::uses('AppController', 'Controller');
/**
 * ItemImages Controller
 *
 * @property ItemImage $ItemImage
 * @property PaginatorComponent $Paginator
 */
class ItemImagesController extends AppController {

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
		$this->ItemImage->recursive = 0;
		$this->set('itemImages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ItemImage->exists($id)) {
			throw new NotFoundException(__('Invalid item image'));
		}
		$options = array('conditions' => array('ItemImage.' . $this->ItemImage->primaryKey => $id));
		$this->set('itemImage', $this->ItemImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ItemImage->create();
			if ($this->ItemImage->save($this->request->data)) {
				$this->Session->setFlash(__('The item image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item image could not be saved. Please, try again.'));
			}
		}
		$companies = $this->ItemImage->Company->find('list');
		$users = $this->ItemImage->User->find('list');
		$items = $this->ItemImage->Item->find('list');
		$this->set(compact('companies', 'users', 'items'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ItemImage->exists($id)) {
			throw new NotFoundException(__('Invalid item image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ItemImage->save($this->request->data)) {
				$this->Session->setFlash(__('The item image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ItemImage.' . $this->ItemImage->primaryKey => $id));
			$this->request->data = $this->ItemImage->find('first', $options);
		}
		$companies = $this->ItemImage->Company->find('list');
		$users = $this->ItemImage->User->find('list');
		$items = $this->ItemImage->Item->find('list');
		$this->set(compact('companies', 'users', 'items'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ItemImage->id = $id;
		if (!$this->ItemImage->exists()) {
			throw new NotFoundException(__('Invalid item image'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ItemImage->delete()) {
			$this->Session->setFlash(__('The item image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
