<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AclManagementAppController {

    public $uses = array('AclManagement.User');

    function beforeFilter() {
        parent::beforeFilter();

        //$this->layout = "default";

        $this->Auth->allow('login', 'logout', 'forgot_password', 'register', 'activate_password', 'confirm_register', 'confirm_email_update');

        $this->User->bindModel(array('belongsTo'=>array(
            'Group' => array(
                'className' => 'AclManagement.Group',
                'foreignKey' => 'group_id',
                'dependent'=>true
            )
        )), false);
    }
    /**
     * Temp acl init db
     */
//    function initDB() {
//        $this->autoRender = false;
//
//        $group = $this->User->Group;
//        //Allow admins to everything
//        $group->id = 1;
//        $this->Acl->allow($group, 'controllers');
//
//        //allow managers to posts and widgets
//        $group->id = 2;
//        $this->Acl->deny($group, 'controllers');
//        //$this->Acl->allow($group, 'controllers/Posts'); //allow all action of controller posts
//        $this->Acl->allow($group, 'controllers/Posts/add');
//        $this->Acl->deny($group, 'controllers/Posts/edit');
//
//        //we add an exit to avoid an ugly "missing views" error message
//        echo "all done";
//        exit;
//    }
    /**
     * login method
     *
     * @return void
     */
    function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Your username or password was incorrect.', 'alert/error');
            }
        }
    }
    /**
     * logout method
     *
     * @return void
     */
    function logout() {
        $this->Session->setFlash('Good-Bye', 'alert/success');
        $this->redirect($this->Auth->logout());
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('title', __('Users'));
        $this->set('description', __('Manage Users'));

        $this->User->recursive = 1;
        $this->paginate = array(
            'limit' => 2
        );
        $this->set('users', $this->paginate("User"));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'), 'alert/error');
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'alert/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert/error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'alert/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert/error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            $this->request->data['User']['password'] = null;
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'alert/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'alert/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     *  Active/Inactive User
     *
     * @param <int> $user_id
     */
    public function toggle($user_id, $status) {
        $this->layout = "ajax";
        $status = ($status) ? 0 : 1;
        $this->set(compact('user_id', 'status'));
        if ($user_id) {
            $data['User'] = array('id'=>$user_id, 'status'=>$status);
            $allowed = $this->User->saveAll($data["User"], array('validate'=>false));
        }
    }

    /**
     * register method
     *
     * @return void
     */
    public function register() {
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
            $this->request->data['User']['group_id']    = 2;//member
            $this->request->data['User']['status']      = 0;//active user
            $token = md5(time());
            $this->request->data['User']['token']         = $token;//key
            if ($this->User->save($this->request->data)) {
                $ident = $this->User->getLastInsertID();
                $comfirm_link = Router::url("/acl_management/users/confirm_register/$ident/$token", true);

                $cake_email = new CakeEmail('smtp');
                $cake_email->from(array('no-reply@example.com' => 'Please Do Not Reply'));
                $cake_email->to($this->request->data['User']['email']);
                $cake_email->subject(''.__('Register Confirm Email'));
                $cake_email->viewVars(array('comfirm_link'=>$comfirm_link));
                $cake_email->emailFormat('html');
                $cake_email->template('AclManagement.register_confirm_email');
                $cake_email->send();


                $this->Session->setFlash(__('Thank you for sign up! Please check your email to complete registration.'), 'alert/success');
                $this->request->data = null;
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('Register could not be completed. Please, try again.'), 'alert/error');
                $this->redirect(array('action' => 'login'));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }
    /**
    * confirm register
    * @return void
    */
    public function confirm_register($ident=null, $activate=null) {//echo $ident.'  '.$activate;
        $return = $this->User->confirmRegister($ident, $activate);
        if ($return) {
            $this->Session->setFlash(__('Congrats! Register Completed.'), 'alert/success');
            $this->redirect(array('action' => 'login'));
        } else {
            $this->Session->setFlash(__('Something went wrong. Please, check your information.'), 'alert/error');
        }
    }
    /**
    * forgot password
    * @return void
    */
    public function forgot_password() {
        if ($this->request->is('post')) {
            //$this->autoRender = false;
            $email = $this->request->data["User"]["email"];
            if ($this->User->forgotPassword($email)) {
                $this->Session->setFlash(__('Please check your email for instructions on resetting your password.'), 'alert/success');
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('Your email is invalid or not registered.'), 'alert/error');
            }
        }
    }
    /**
    * active password
    * @return void
    */
    public function activate_password($ident=null, $activate=null, $expiredTime) {//echo $ident.'  '.$activate;
        $nowTime = strtotime(date('Y-m-d H:i'));
        if(empty($expiredTime) || $nowTime > $expiredTime){
            $this->Session->setFlash(__('Your link had been expired.'), 'alert/error');
            $this->redirect(array('action' => 'login'));
        }

        if ($this->request->is('post')) {
            if (!empty($this->request->data['User']['ident']) && !empty($this->request->data['User']['activate'])) {
                $this->set('ident', $this->request->data['User']['ident']);
                $this->set('activate', $this->request->data['User']['activate']);

                $return = $this->User->activatePassword($this->request->data);
                if ($return) {
                    $this->User->set($this->request->data);
                    if ($this->User->validates()) {
                        $this->request->data['User']['id'] = $this->request->data['User']['ident'];
                        if($this->User->saveAll($this->request->data['User'], array('validate'=>false))){
                            $this->Session->setFlash(__('New password is saved.'), 'alert/success');
                            $this->redirect(array('action' => 'login'));
                        }
                    }else{
                        $errors = $this->User->validationErrors;
                        $this->Session->setFlash(__('Error Occur!'), 'alert/error');
                    }
                } else {
                    $this->Session->setFlash(__('Sorry password could not be saved. Please check your email and click the password reset link again.'), 'alert/error');
                }
            }
        }
        $this->set(compact('ident', 'activate'));
    }

    /**
     * edit profile method
     *
     * @return void
     */
    public function edit_profile() {
        if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->request->data['User']['password']) || !empty($this->request->data['User']['password2'])){
                //do nothing
            }else{
                //do not check password validate
                unset($this->request->data['User']['password']);
            }

            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                //check email change
                if($this->request->data['User']['email'] != $this->Session->read('Auth.User.email')){
                    $this->Session->write('Auth.User.needverify_email', $this->request->data['User']['email']);
                    $id = $this->Session->read('Auth.User.id');
                    $email = base64_encode($this->request->data['User']['email']);
                    $expiredTime = strtotime(date('Y-m-d H:i', strtotime('+24 hours')));
                    $comfirm_link = Router::url("/acl_management/users/confirm_email_update/$id/$email/$expiredTime", true);
                    $cake_email = new CakeEmail('smtp');
                    $cake_email->from(array('admin@quicksstore.com' => 'Please Do Not Reply'));
                    $cake_email->to($this->request->data['User']['email']);
                    $cake_email->subject(''.__('Email Address Update'));
                    $cake_email->viewVars(array('comfirm_link'=>$comfirm_link, 'old_email'=> $this->Session->read('Auth.User.email'), 'new_email'=>$this->request->data['User']['email']));
                    $cake_email->emailFormat('html');
                    $cake_email->template('AclManagement.email_address_update');
                    $cake_email->send();

                    unset($this->request->data['User']['email']);
                }


                $this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
                if($this->User->saveAll($this->request->data['User'], array('validate'=>false))){
                    $this->Session->setFlash(__('Congrats! Your profile has been updated successfully'), 'alert/success');
                    $this->redirect(array('action' => 'edit_profile',));
                }
            }else{
                $errors = $this->User->validationErrors;
                $this->Session->setFlash(__('Something went wrong. Please, check your information.'), 'alert/error');
            }

        }else{
            $this->request->data = $this->User->read(null, $this->Auth->user('id'));
            $this->request->data['User']['password'] = '';
        }
    }
         /**
    * confirm register
    * @return void
    */
    public function confirm_email_update($id=null, $email=null, $expiredTime=null) {
        $nowTime = strtotime(date('Y-m-d H:i'));
        if(empty($expiredTime) || $nowTime > $expiredTime){
            $this->Session->setFlash(__('Your link had been expired.'), 'alert/error');
            $this->redirect(array('action' => 'login'));
        }

        $email = base64_decode($email);
        if(Validation::email($email)){
            $checkExistId = $this->User->find('count', array('conditions'=>array('User.id' => $id)));
            $checkExistEmail = $this->User->find('count', array('conditions'=>array('User.email' => $email)));

            if ($checkExistId > 0 && $checkExistEmail <= 0) {
                $this->request->data['User']['id'] = $id;
                $this->request->data['User']['email'] = $email;
                $this->User->saveAll($this->request->data, array('validate'=>false));
                $this->Auth->logout();
                $this->Session->setFlash(__('Email updated. Now, you can login with new email.'), 'alert/success');
                $this->redirect(array('action' => 'login'));
            }
        }

        $this->Session->setFlash(__('Something went wrong. Sorry for any inconvenience.'), 'alert/error');
        $this->redirect(array('action' => 'login'));
    }

    public function dashboard(){
        $this->layout = "admin";
       /*$this->theme = "QuicksStore";
        $this->layout = "default";

        $userDetails = $this->Session->read('Auth.User');
        //debug($user);
        //get item list
    
        $this->loadModel('Item');
        $item = $this->Item->find('list',array(
            'conditions'=>array('Item.user_id'=>$userDetails['id'])
            ));
        //set a variable to view
        $this->set('item',$item);
        //get unit measurement list
        $this->loadModel('UnitMeasuremedant');
        $unit = $this->UnitMeasurement->find('list',array(
            'conditions'=>array('UnitMeasurement.user_id'=>$userDetails['id']),
            ));
        //set a variable to view
        $this->set('unit',$unit);

        //count item
        $count_item = $this->Item->find('count',array(
            'conditions'=>array('Item.user_id'=>$userDetails['id']),
            ));
        $this->set('item_count',$count_item);


        $this->loadModel('Image');
        $get_image = $this->Image->find('all',array(
                        'conditions' => array('Image.user_id'=>$userDetails['id']),
                        'order'=>array('Image.created'=>'desc'),
                        'limit'=>1
                    ));
        $this->set('user_image',$get_image);

        $this->loadModel('Setting');
        $get_setting = $this->Setting->find('all',array(
                        'conditions' => array('Setting.user_id'=>$userDetails['id']),
                        'order'=>array('Setting.created'=>'desc'),
                        'limit'=>1
                    ));
        $this->set('settings',$get_setting);

        $this->loadModel('Stock');
        $users = $this->Stock->User->find('list');
        $items = $this->Stock->Item->find('list',array('conditions'=>array('Item.user_id'=>$userDetails['id'])));
        $this->set(compact('users', 'items'));

        //count low stock
        $countLowStock = $this->Stock->find('count',array(
            'conditions'=>array('Stock.user_id'=>$userDetails['id'],'Stock.stock_status'=>'Reached minimum stock. Need to restock'),
            ));
        $this->set('lowStock',$countLowStock);

    

        //$this->stock_alert();
        //$this->showSubscription();*/
    }

}
?>