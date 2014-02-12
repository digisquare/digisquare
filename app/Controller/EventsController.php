<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {

	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$editions = $this->Event->Edition->find('list');
		$places = $this->Event->Place->find('list');
		$tags = $this->Event->Tag->find('list');
		$this->set(compact('editions', 'places', 'tags'));
	}

	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$editions = $this->Event->Edition->find('list');
		$places = $this->Event->Place->find('list');
		$tags = $this->Event->Tag->find('list');
		$this->set(compact('editions', 'places', 'tags'));
	}

	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('The event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function participate($id = null){
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));	
		}
		$participant = array(
			'Participant' => array(
				'event_id' => $id,
				'user_id' => $this->Auth->user('id')
			)
		);
		if ($this->Event->Participant->save($participant)) {
			$this->Session->setFlash(__('Your participation to this event has been saved.'));
		} else {
			$this->Session->setFlash(__('Your participation to this event could not been saved. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
