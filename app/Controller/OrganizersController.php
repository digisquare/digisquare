<?php
App::uses('AppController', 'Controller');

class OrganizersController extends AppController {

	public function index() {
		$this->Organizer->recursive = 0;
		$this->set('organizers', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Organizer->exists($id)) {
			throw new NotFoundException(__('Invalid organizer'));
		}
		$options = array('conditions' => array('Organizer.' . $this->Organizer->primaryKey => $id));
		$this->set('organizer', $this->Organizer->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Organizer->create();
			if ($this->Organizer->save($this->request->data)) {
				$this->Session->setFlash(__('The organizer has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizer could not be saved. Please, try again.'), 'message_error');
			}
		}
		$events = $this->Organizer->Event->find('list');
		$organizations = $this->Organizer->Organization->find('list');
		$this->set(compact('events', 'organizations'));
	}

	public function edit($id = null) {
		if (!$this->Organizer->exists($id)) {
			throw new NotFoundException(__('Invalid organizer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Organizer->save($this->request->data)) {
				$this->Session->setFlash(__('The organizer has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizer could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Organizer.' . $this->Organizer->primaryKey => $id));
			$this->request->data = $this->Organizer->find('first', $options);
		}
		$events = $this->Organizer->Event->find('list');
		$organizations = $this->Organizer->Organization->find('list');
		$this->set(compact('events', 'organizations'));
	}

	public function delete($id = null) {
		$this->Organizer->id = $id;
		if (!$this->Organizer->exists()) {
			throw new NotFoundException(__('Invalid organizer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organizer->delete()) {
			$this->Session->setFlash(__('The organizer has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The organizer could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

}
