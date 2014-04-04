<?php
App::uses('AppController', 'Controller');

class PlacesController extends AppController {

	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

	public function feed(){
		$places = $this->Place->find('all', array(
			'contain' => array(),
			'limit' => 10,
			'order' => array('Place.created' => 'DESC'),
		));
		$this->set(compact('places'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Place->Edition->find('list');
		$this->set(compact('editions'));
	}

	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$editions = $this->Place->Edition->find('list');
		$this->set(compact('editions'));
	}

	public function delete($id = null) {
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function top() {
		$places = $this->Place->find('all', array(
			'fields' => array(
				'count(Event.place_id) AS count',
				'Place.id',
				'City.name',
				'Place.name',
				'Place.created',
				'Place.modified'
			),
			'conditions' => 'Event.end_at > NOW()',
			'limit' => 10,
			'joins' => array(
				array(
					'table' => 'events',
					'alias' => 'Event',
					'conditions' => 'Event.place_id = Place.id'
				),
				array(
					'table' => 'editions',
					'alias' => 'City',
					'conditions' => 'City.id = Place.edition_id'
				)
			),
			'group' => 'Place.id',
			'order' => 'count DESC'
		));
		$this->set(compact('places'));
	}
	
	public function organizations($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$organizations = $this->Paginator->paginate('Organization', array('Organization.place_id' => $id));	
		$this->set(compact('organizations'));
	}
	
}
