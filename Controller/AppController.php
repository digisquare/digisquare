<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth',
		'Paginator' => array('paramType' => 'querystring'),
		'RequestHandler',
	);

	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);

	public function beforeFilter() {
		$this->Auth->allow('index', 'feed', 'view', 'top', 'pastevents');
	}

}
