<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');

/**
 * Posts Controller
 *
 * @property Post $Post
 */
class UserPermissionsController extends AclManagementAppController {
    public $helpers = array('AclManagement.Tree');
    public $Permission = null;

    public function  beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('index', 'get_children', 'edit', 'toggle', 'sync');

        $this->layout = "admin";
        $this->Permission = ClassRegistry::init('Permission');
    }

    private function __acosList(){
        $results = $this->Acl->Aco->find('all',
            array(
                'order' => array('lft' => 'ASC'),
                'recursive' => -1,
                'fields' => array('alias', 'id', 'lft', 'rght', 'parent_id')
                )
            );

        $this->__acos_details($results);
        return $results;
    }
    public function index(){
        $this->set('results', $this->__acosList());
    }

    public function sync(){
        $this->layout = 'ajax';

        Configure::write('debug', 1);

        App::uses('AclExtras', 'AclManagement.Lib');
        $acl = new AclExtras();
        $acl->aco_sync();

        $permissions = ClassRegistry::init('Permission');
        $checkAdminPerm = $permissions->find('count', array('conditions'=>array('aro_id'=>1, 'aco_id'=>1)));
        if($checkAdminPerm <= 0){
            //Allow admins to everything
            $this->loadModel('Group');
            $group = $this->Group;
            $group->id = 1;
            $this->Acl->allow($group, 'controllers');
        }
        $this->set('results', $this->__acosList());
    }


    public function edit($acoId) {
        $this->layout = "ajax";
        $acoPath = $this->Acl->Aco->getPath($acoId);

        if (!$acoPath) {
            return;
        }

        $aros = array();

        $this->loadModel('Group');

        foreach ($this->Group->find('all') as $role) {
            $hasAny = array(
                'aco_id' => $acoId,
                'aro_id' => $role['Group']['id'],
                '_create' => 1,
                '_read' => 1,
                '_update' => 1,
                '_delete' => 1
                );
            $aros[$role['Group']['name']] = array(
                'id' => $role['Group']['id'],
                'allowed' => (int)$this->Permission->hasAny($hasAny)
                );
        }

        $results = $this->Acl->Aco->find('all',
            array(
                'order' => array('lft' => 'ASC'),
                'recursive' => -1,
                'fields' => array('alias', 'id', 'lft', 'rght', 'parent_id')
                )
            );

        $this->__acos_details($results);

        $this->set('acoPath', $acoPath);
        $this->set('aros', $aros);
    }

    public function toggle($acoId, $aroId) {
        $this->layout = "ajax";
        if ($aroId != 1) {
            $this->loadModel('Permission');

            $conditions = array(
                'Permission.aco_id' => $acoId,
                'Permission.aro_id' => $aroId,
                );

            if ($this->Permission->hasAny($conditions)) {
                $data = $this->Permission->find('first', array('conditions' => $conditions));

                if ($data['Permission']['_create'] == 1 &&
                    $data['Permission']['_read'] == 1 &&
                    $data['Permission']['_update'] == 1 &&
                    $data['Permission']['_delete'] == 1) {
                    // from 1 to 0
                    $data['Permission']['_create'] = 0;
                $data['Permission']['_read'] = 0;
                $data['Permission']['_update'] = 0;
                $data['Permission']['_delete'] = 0;
                $allowed = 0;
            } else {
                    // from 0 to 1
                $data['Permission']['_create'] = 1;
                $data['Permission']['_read'] = 1;
                $data['Permission']['_update'] = 1;
                $data['Permission']['_delete'] = 1;
                $allowed = 1;
            }
        } else {
                // create - CRUD with 1
            $data['Permission']['aco_id'] = $acoId;
            $data['Permission']['aro_id'] = $aroId;
            $data['Permission']['_create'] = 1;
            $data['Permission']['_read'] = 1;
            $data['Permission']['_update'] = 1;
            $data['Permission']['_delete'] = 1;
            $allowed = 1;
        }

        $this->Permission->save($data);
        $this->set('allowed', $allowed);
    } else {
        $this->set('allowed', 1);
    }
}

private function __acos_details($results) {
    $list = $acosYaml = array();
    App::import('Vendor', 'Spyc');
    foreach ($results as $aco) {
        $list[$aco['Aco']['id']] = $aco['Aco'];

            if (!$aco['Aco']['parent_id']) { # module
                if (CakePlugin::loaded($aco['Aco']['alias'])) {
                    $ppath = CakePlugin::path($aco['Aco']['alias']);
                    $isField = strpos($ppath, DS . 'Fields' . DS);
                    $isTheme = strpos($ppath, DS . 'Themed' . DS);

                    if ($isField) {
                        $m = array();
                        $m['yaml'] = Spyc::YAMLLoad("{$ppath}{$aco['Aco']['alias']}.yaml");
                    } else {
                        $m = Configure::read('Modules.' . $aco['Aco']['alias']);
                    }

                    if ($isField) {
                        $list[$aco['Aco']['id']]['name'] = __d('locale', 'Field: %s', $m['yaml']['name']);
                    } elseif ($isTheme) {
                        $list[$aco['Aco']['id']]['name'] = __d('locale', 'Theme: %s', $m['yaml']['name']);
                    } else {
                        $list[$aco['Aco']['id']]['name'] = __d('locale', 'Module: %s', $m['yaml']['name']);
                    }

                    $list[$aco['Aco']['id']]['description'] = $m['yaml']['description'];

                    if (file_exists("{$ppath}acos.yaml")) {
                        $acosYaml[$aco['Aco']['id']] = Spyc::YAMLLoad("{$ppath}acos.yaml");
                    }
                } else {
                    $list[$aco['Aco']['id']]['name'] = $aco['Aco']['alias'];
                    $list[$aco['Aco']['id']]['description'] = '';
                }
            } else {
                // controller
                if (isset($acosYaml[$aco['Aco']['parent_id']])) {
                    $yaml = $acosYaml[$aco['Aco']['parent_id']];

                    $list[$aco['Aco']['id']]['name'] = isset($yaml[$aco['Aco']['alias']]['name']) ? $yaml[$aco['Aco']['alias']]['name'] : $aco['Aco']['alias'];
                    $list[$aco['Aco']['id']]['description'] = isset($yaml[$aco['Aco']['alias']]['description']) ? $yaml[$aco['Aco']['alias']]['description'] : '';
                } elseif (isset($list[$aco['Aco']['parent_id']])) { # method
                    $controller = $list[$aco['Aco']['parent_id']];
                    $yaml = isset($acosYaml[$controller['parent_id']]) ? $acosYaml[$controller['parent_id']] : array();

                    $list[$aco['Aco']['id']]['name'] = isset($yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['name']) ? $yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['name']: $aco['Aco']['alias'];
                    $list[$aco['Aco']['id']]['description'] = isset($yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['description']) ? $yaml[$controller['alias']]['actions'][$aco['Aco']['alias']]['description'] : '';
                }
            }

            $this->set('acos_details', $list);
        }
    }
}
?>
