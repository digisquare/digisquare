<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['view', 'logout']);
	}

	public function isAuthorized($user = null) {
		if ('edit' === $this->action) {
			if ($this->params['id'] === $this->Auth->user('id')
				|| $this->params['id'] === null
			) {
				return true;
			}
		}
		parent::isAuthorized($user);
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'), 'message_error');
			}
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		$this->Paginator->settings['contain'] = false;
		$users = $this->Paginator->paginate();
		$this->set(compact('users'));
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->find('first', [
			'contain' => false,
			'conditions' => ['User.id' => $id]
		]);
		$this->set(compact('user'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->User->id]);
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'message_error');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function edit($id = null) {
		if (!$id) {
			$id = $this->Auth->user('id');
		}
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->User->id]);
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$user = $this->User->find('first', [
				'contain' => false,
				'conditions' => ['User.id' => $id]
			]);
			if ($this->request->query('twitter')) {
				$this->request->data = $this->User->twitter($user);
			} else {
				$this->request->data = $user;
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(['action' => 'index']);
	}

}