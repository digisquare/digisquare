<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = [
		'Session',
		'Auth',
		'Paginator' => ['paramType' => 'querystring'],
		'RequestHandler',
	];

	public $helpers = [
		'Session',
		'Html' => ['className' => 'BoostCake.BoostCakeHtml'],
		'Form' => ['className' => 'BoostCake.BoostCakeForm'],
		'Paginator' => ['className' => 'BoostCake.BoostCakePaginator'],
	];

	public function beforeFilter() {
		$this->Auth->allow('index', 'feed', 'view');
	}

}
