<?php
App::uses('AppController', 'Controller');

class AuthenticationsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('callback');
		$this->Security->unlockedActions = ['callback'];
	}

	public function callback() {
		if (isset($this->data['error'])) {
			$this->Session->setFlash(__('The user could not be authenticated. Please, try again.') . $this->data['error'], 'message_error');
			return $this->redirect($this->Auth->loginAction);
		}

		if ($this->Auth->user()) {
			$this->Authentication->addCredentials($this->Auth->user('id'), $this->data['auth']);
			$this->Session->setFlash(__('The authentication has been saved.'), 'message_success');
			return $this->redirect($this->Auth->redirect());
		}

		$user = $this->Authentication->updateOrCreateUser($this->data['auth']);

		if ($this->Auth->login($user['User'])) {
			$this->Session->setFlash(__('You are logged in.'), 'message_success');
			return $this->redirect($this->Auth->redirect());
		} else {
			$this->Session->setFlash(__('The user could not be authenticated. Please, try again.'), 'message_error');
			return $this->redirect($this->Auth->loginAction);
		}
	}

}