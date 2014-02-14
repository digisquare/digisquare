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
		$events = $this->Edition->Event->find('all', array(
			'conditions' => array('Event.edition_id' => $id)));
		$this->set(compact('events'));
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
				$this->Session->setFlash(__('The edition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'));
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
			$this->Session->setFlash(__('The edition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The edition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function organizations($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$organizations = $this->Edition->Organization->find('all', array(
			'conditions' => array('Organization.edition_id' => $id)
		));
		$this->set(compact('organizations'));
		$this->set('organization', $this->Paginator->paginate());
	}

	public function top() {
		$editions = $this->Edition->find('all', array(
				'fields' => array(
						'count(Event.edition_id) AS count',
						'Edition.id',
						'Edition.name',
						'Edition.created',
						'Edition.modified'
				),
				'joins' => array(
						array(
							'table' => 'events',
							'alias' => 'Event',
							'conditions' => 'Event.edition_id = Edition.id'
						)
				),
				'conditions' => 'Event.end_at > NOW()',
				'group' => 'Edition.id',
				'order' => 'count DESC',			
				'limit' => 10
			));
		$this->set('editions', $editions);
	}

}
