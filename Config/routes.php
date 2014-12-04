<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'users', 'action' => 'dashboard'));
	//list user
	Router::connect('/admin/users', array('controller' => 'users', 'action'=>'index'));
	//register
	Router::connect('/users/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/users/confirm_register', array('controller' => 'users', 'action' => 'confirm_register'));
	Router::connect('/users/edit_profile', array('controller' => 'users', 'action' => 'edit_profile'));
	Router::connect('/users/forgot_password', array('controller' => 'users', 'action' => 'forgot_password'));
	Router::connect('/users/activate_password/*', array('controller' => 'users', 'action' => 'activate_password'));
	//login
	Router::connect('/users/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/admin/users/login', array('admin'=>true,'controller' => 'users', 'action' => 'login'));
	//logout
	Router::connect('/users/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/admin/users/logout', array('admin'=>true,'controller' => 'users', 'action' => 'logout'));
	//user action
	Router::connect('/admin/users/add', array('controller' => 'users', 'action'=>'add'));
	Router::connect('/admin/users/view/*', array('controller' => 'users', 'action'=>'view'));
	Router::connect('/admin/users/edit/*', array('controller' => 'users', 'action'=>'edit'));
	Router::connect('/admin/users/delete/*', array('controller' => 'users', 'action'=>'delete'));
	Router::connect('/admin/users/toggle/*', array('controller' => 'users', 'action'=>'toggle'));
	Router::connect('/member/users/view/*', array('controller' => 'users', 'action'=>'member_view'));

	//list group
	Router::connect('/admin/groups', array('controller' => 'groups', 'action'=>'index'));
	//groups action
	Router::connect('/admin/groups/add', array('controller' => 'groups', 'action'=>'add'));
	Router::connect('/admin/groups/edit/*', array('controller' => 'groups', 'action'=>'edit'));
	Router::connect('/admin/groups/delete/*', array('controller' => 'groups', 'action'=>'delete'));

	//list permissions
	Router::connect('/admin/user_permissions', array('controller' => 'user_permissions', 'action'=>'index'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
