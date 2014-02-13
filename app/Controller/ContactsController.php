<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContactsController extends AppController {

	public $components = array('Email');

	public function index() {
		if(!empty($this->data)) {
			$this->Contact->create($this->data);
 
			if (!$this->Contact->validates()) {
				$this->Session->setFlash('Veuillez corriger les erreurs mentionnées.');
				$this->validateErrors($this->Contact);
			} else {
				CakeEmail::deliver(
					'bordeaux@digisquare.net',
					'De : ' . $this->data['Contact']['first_name'] . ' ' . $this->data['Contact']['last_name'],
					'Email : ' . $this->data['Contact']['email'] . "\n"
						. 'Message : ' . "\n"
						. $this->data['Contact']['message'],
					array('from' => 'website@digisquare.net')
				);

				$this->Session->setFlash('Votre message a été envoyé.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function confirmation() {

	}

}
?>