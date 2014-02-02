<?php
App::uses('AppController', 'Controller');

class AuthenticationsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('callback');
	}

	public function callback() {
		if (isset($this->data['error'])) {
			$this->Session->setFlash(__('The user could not be authenticated. Please, try again.') . $this->data['error']);
			return $this->redirect($this->Auth->loginAction);
		}

		if ($this->Auth->user()) {
			$this->Authentication->addCredentials($this->Auth->user('id'), $this->data['auth']);
			$this->Session->setFlash(__('The authentication has been saved.'));
			return $this->redirect($this->Auth->redirect());
		}

		$user = $this->Authentication->findOrAddUser($this->data['auth']);

		if ($this->Auth->login($user['User'])) {
			$this->Session->setFlash(__('You are logged in.'));
			return $this->redirect($this->Auth->redirect());
		} else {
			$this->Session->setFlash(__('The user could not be authenticated. Please, try again.'));
			return $this->redirect($this->Auth->loginAction);
		}
	}

}