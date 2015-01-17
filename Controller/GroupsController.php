<?php
App::uses('AppController', 'Controller');

class GroupsController extends AppController {

	public function index() {
		$this->Paginator->settings['contain'] = false;
		$groups = $this->Paginator->paginate();
		$this->set(compact('groups'));
	}

	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$group = $this->Group->find('first', [
			'contain' => ['User'],
			'conditions' => ['Group.id' => $id]
		]);
		$this->set(compact('group'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Group->id]);
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'message_error');
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Group->id]);
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$group = $this->Group->find('first', [
				'contain' => ['User'],
				'conditions' => ['Group.id' => $id]
			]);
			$this->request->data = $group;
		}
	}

	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('The group has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(['action' => 'index']);
	}
}
