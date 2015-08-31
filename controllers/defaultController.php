<?php

class defaultController extends testProjectController {
	
	public $name = 'default';	
	
	public function actionIndex() {
		$this->render('index');
	}
	
}