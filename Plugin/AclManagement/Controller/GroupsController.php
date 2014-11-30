<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AclManagementAppController {

    function beforeFilter() {
        parent::beforeFilter();

        $this->layout = "admin";
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('title', __('Groups'));
        $this->set('description', __('Manage Groups'));

        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        $this->set('group', $this->Group->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('The group has been saved'), 'alert/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'alert/error');
            }
        }
        $this->paginate = array(
            'limit' => 2
        );
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate('Group'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('The group has been saved'), 'alert/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'alert/error');
            }
        } else {
            $this->request->data = $this->Group->read(null, $id);
        }
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'), 'alert/error');
        }
        if ($this->Group->delete()) {
            $this->Session->setFlash(__('Group deleted'), 'alert/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Group was not deleted'), 'alert/error');
        $this->redirect(array('action' => 'index'));
    }

}
?>