<?php
App::uses('AppController', 'Controller');

class EditionsController extends AppController {

	public function index() {
		$this->Edition->recursive = 0;
		$this->set('editions', $this->Paginator->paginate());
	}

	public function feed($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$edition = $this->Edition->find('first', array(
			'contain' => array(
				'Event' => array(
					'limit' => 10,
					'order' => array('Event.created' => 'DESC'),
				),
			),
			'conditions' => array('id' => $id)
		));
		$this->set(compact('edition'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function view($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$options = array('conditions' => array('Edition.' . $this->Edition->primaryKey => $id));
		$this->set('edition', $this->Edition->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Edition->create();
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'message_error');
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Edition.' . $this->Edition->primaryKey => $id));
			$this->request->data = $this->Edition->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Edition->id = $id;
		if (!$this->Edition->exists()) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Edition->delete()) {
			$this->Session->setFlash(__('The edition has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The edition could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function organizations($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$organizations = $this->Paginator->paginate('Organization', array(
			'Organization.edition_id' => $id
		));
		$this->set(compact('organizations'));
	}

	public function top() {
		$editions = $this->Edition->Event->find('all', array(
			'fields' => array(
				'count(Event.edition_id) AS count',
				'Edition.id',
				'Edition.name',
				'Edition.created',
				'Edition.modified'
			),
			'contain' => array('Event'),
			'conditions' => 'Event.end_at > NOW()',
			'group' => 'Edition.id',
			'order' => 'count DESC',			
			'limit' => 10
		));
		$this->set(compact('editions'));
	}

	public function places($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$places = $this->Paginator->paginate('Place', array(
			'Place.edition_id' => $id
		));
		$this->set(compact('places'));
	}
}
