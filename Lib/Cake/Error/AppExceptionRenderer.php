<?php

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {
	public function missingController($error) {
    	$this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'), 404);
	}
 	public function missingAction($error) {
        $this->missingController($error);
    }
}