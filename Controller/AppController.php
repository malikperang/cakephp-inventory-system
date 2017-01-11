<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $theme  = 'SbAdmin';
    public $layout = 'admin';

	public $components = array(
        'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email'),
                    'scope'  => array('User.status' => 1)
                )
            ),
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );

    public function beforeFilter() {
     parent::beforeFilter();
 
     // $this->Auth->allow();//must comment after generate action
 
     //Configure AuthComponent
     $this->Auth->loginAction = '/users/login';
     $this->Auth->logoutRedirect = '/users/login';
     $this->Auth->loginRedirect = array(
            'controller' => 'users', 'action' => 'dashboard');

     
   
    }

    

    public function beforeRender(){
        parent::beforeRender();

        $userDetails = $this->Session->read('Auth.User');
        $this->set('userDetails',$userDetails);

        $this->loadModel('SystemSetting');
        $sysetting = $this->SystemSetting->findLatestSetting();
        $this->set(compact('sysetting'));
    }
}
