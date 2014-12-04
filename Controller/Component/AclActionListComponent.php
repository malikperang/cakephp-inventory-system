<?php
App::uses('ComponentCollection', 'Controller');
App::uses('AclComponent', 'Controller/Component');
class AclActionListComponent extends Component {

    /**
     * Contains instance of AclComponent
     *
     * @var AclComponent
     * @access public
     */
    public $Acl;

    public function startup($controller) {
        parent::startup($controller);

        $collection = new ComponentCollection();
        $this->Acl = new AclComponent($collection);
        $controller = null;
        $this->Acl->startup($controller);
        $this->Aco = $this->Acl->Aco;
    }

    public function getController() { 
        $controllers = $this->getControllerList();
        $controllers = $this->getAction($controllers);
        return $controllers;
    }

    public function getPluginController() {
        $plugins = CakePlugin::loaded();
        $controllers = null;
        foreach ($plugins as $plugin) {
            $controllerList = $this->getControllerList($plugin);
            $controllerList = $this->getAction($controllerList, $plugin);
            if(!empty($controllerList)){
                $controllers[$plugin] = $controllerList;
            }
        }
        return $controllers;
    }

    /**
     * Get a list of controllers in the app and plugins.
     *
     * Returns an array of path => import notation.
     *
     * @param string $plugin Name of plugin to get controllers for
     * @return array
     * */
    public function getControllerList($plugin = null) {
        if (!$plugin) {
            $controllers = App::objects('Controller', null, false);
        } else {
            $controllers = App::objects($plugin . '.Controller', null, false);
        }
        return $controllers;
    }

    function getAction($controllers, $plugin = null) {
        $dotPlugin = $pluginPath = $plugin;
        if ($plugin) {
                $dotPlugin .= '.';
                $pluginPath .= '/';
        }        
        
        $controllersList = null;
        foreach ($controllers as $controller) {
            if(!preg_match('/AppController/', $controller)){
                App::uses($controller, $dotPlugin . 'Controller');
                $baseMethods = get_class_methods('Controller');
                $actions = get_class_methods($controller);
                $methods = array_diff($actions, $baseMethods);
                foreach ($methods as $action) {
                    $controllerName = preg_replace('/Controller$/', '', $controller);
                    $controllersList[$controllerName][] = $action;
                }
            }
        }
        return $controllersList;
    }
}

?>
