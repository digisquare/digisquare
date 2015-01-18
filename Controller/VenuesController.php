<?php
App::uses('AppController', 'Controller');

class VenuesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['view']);
	}

	public function index() {
		$this->Venue->recursive = 0;
		$this->set('venues', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$venue = $this->Venue->find('first', [
			'contain' => ['Edition'],
			'conditions' => ['Venue.id' => $id],
		]);
		$this->set(compact('venue'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Venue->create();
			if ($this->Venue->save($this->request->data)) {
				$this->Session->setFlash(__('The venue has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Venue->id]);
			} else {
				$this->Session->setFlash(__('The venue could not be saved. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Venue->Edition->find('list');
		$this->set(compact('editions'));
	}

	public function edit($id = null) {
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Venue->save($this->request->data)) {
				$this->Session->setFlash(__('The venue has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Venue->id]);
			} else {
				$this->Session->setFlash(__('The venue could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$venue = $this->Venue->find('first', [
				'contain' => false,
				'conditions' => ['Venue.id' => $id]
			]);
			if ($this->request->query('geocode')) {
				$this->request->data = $this->Venue->geocode($venue);
			} else {
				$this->request->data = $venue;
			}
		}
		$editions = $this->Venue->Edition->find('list');
		$this->set(compact('editions'));
	}

	public function delete($id = null) {
		$this->Venue->id = $id;
		if (!$this->Venue->exists()) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Venue->delete()) {
			$this->Session->setFlash(__('The venue has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The venue could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(['action' => 'index']);
	}

	public function merge() {
		if ($this->request->is('post') && isset($this->request->data['Venue']['merge'])) {
			if ($this->Venue->merge($this->request->data)) {
				$this->Session->setFlash(__('The venues were merged.'), 'message_success');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Session->setFlash(__('The venues could not be merged. Please, try again.'), 'message_error');
			}
		} else if ($this->request->is('post')) {
			if ($this->request->data['Venue']['venue_id_1'] > $this->request->data['Venue']['venue_id_2']) {
				$temp_venue_id = $this->request->data['Venue']['venue_id_1'];
				$this->request->data['Venue']['venue_id_1'] = $this->request->data['Venue']['venue_id_2'];
				$this->request->data['Venue']['venue_id_2'] = $temp_venue_id;
			}
			$venue_1 = $this->Venue->find('first', [
				'contain' => false,
				'conditions' => [
					'Venue.id' => $this->request->data['Venue']['venue_id_1']
				]
			]);
			$venue_2 = $this->Venue->find('first', [
				'contain' => false,
				'conditions' => [
					'Venue.id' => $this->request->data['Venue']['venue_id_2']
				]
			]);
			$this->set(compact('venue_1', 'venue_2'));
		}
		$venues = $this->Venue->find('list', ['order' => ['Venue.name' => 'ASC']]);
		$this->set(compact('venues'));
	}

}
