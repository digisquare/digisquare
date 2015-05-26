<?php
App::uses('AppController', 'Controller');

class MembersController extends AppController {

	public function index() {
		$this->Paginator->settings['contain'] = ['User', 'Organization' => 'Edition'];
		$members = $this->Paginator->paginate('Member');
		$this->set(compact('members'));
	}

	public function view($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
		$this->set('member', $this->Member->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Member->create();
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'message_error');
			}
		}
		$users = $this->Member->User->find('list',
			['fields' => 'username']
		);
		$organizations = $this->Member->Organization->find('list');
		$this->set(compact('users', 'organizations'));
	}

	public function edit($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
			$this->request->data = $this->Member->find('first', $options);
		}
		$users = $this->Member->User->find('list');
		$organizations = $this->Member->Organization->find('list');
		$this->set(compact('users', 'organizations'));
	}

	public function delete($id = null) {
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Member->delete()) {
			$this->Session->setFlash(__('The member has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The member could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
