<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth',
		'Paginator'
	);

	public function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}

}