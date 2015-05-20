<?php
App::uses('AppController', 'Controller');

class OrganizersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['recount']);
	}

	public function recount() {
		$this->Organizer->updateRecentEventCount();
		
		die;
	}

}
