<?php
App::uses('AppController', 'Controller');

class OrganizationsController extends AppController {

	public function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'), 'message_error');
			}
		}
		$places = $this->Organization->Place->find('list');
		$editions = $this->Organization->Edition->find('list');
		$this->set(compact('places', 'editions'));
	}

	public function edit($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}
		$places = $this->Organization->Place->find('list');
		$editions = $this->Organization->Edition->find('list');
		$this->set(compact('places', 'editions'));
	}

	public function delete($id = null) {
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organization->delete()) {
			$this->Session->setFlash(__('The organization has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The organization could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

}
