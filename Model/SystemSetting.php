<?php
App::uses('AppModel', 'Model');
/**
 * SystemSetting Model
 *
 * @property Company $Company
 */
class SystemSetting extends AppModel {


	public function findLatestSetting(){
		$setting = $this->find('first',array('conditions'=>array(),'order'=>array('SystemSetting.created' => 'DESC')));
		return $setting;
	}

}
