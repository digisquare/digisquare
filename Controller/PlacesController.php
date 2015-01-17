<?php
App::uses('AppController', 'Controller');

class PlacesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['view']);
	}

	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$place = $this->Place->find('first', [
			'contain' => ['Edition'],
			'conditions' => ['Place.id' => $id],
		]);
		$this->set(compact('place'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Place->id]);
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'), 'message_error');
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Place->id]);
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$place = $this->Place->find('first', [
				'contain' => false,
				'conditions' => ['Place.id' => $id]
			]);
			if ($this->request->query('geocode')) {
				$this->request->data = $this->Place->geocode($place);
			} else {
				$this->request->data = $place;
			}
		}
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
		return $this->redirect(['action' => 'index']);
	}

	public function merge() {
		if ($this->request->is('post') && isset($this->request->data['Place']['merge'])) {
			if ($this->Place->merge($this->request->data)) {
				$this->Session->setFlash(__('The places were merged.'), 'message_success');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Session->setFlash(__('The places could not be merged. Please, try again.'), 'message_error');
			}
		} else if ($this->request->is('post')) {
			if ($this->request->data['Place']['place_id_1'] > $this->request->data['Place']['place_id_2']) {
				$temp_place_id = $this->request->data['Place']['place_id_1'];
				$this->request->data['Place']['place_id_1'] = $this->request->data['Place']['place_id_2'];
				$this->request->data['Place']['place_id_2'] = $temp_place_id;
			}
			$place_1 = $this->Place->find('first', [
				'contain' => false,
				'conditions' => [
					'Place.id' => $this->request->data['Place']['place_id_1']
				]
			]);
			$place_2 = $this->Place->find('first', [
				'contain' => false,
				'conditions' => [
					'Place.id' => $this->request->data['Place']['place_id_2']
				]
			]);
			$this->set(compact('place_1', 'place_2'));
		}
		$places = $this->Place->find('list', ['order' => ['Place.name' => 'ASC']]);
		$this->set(compact('places'));
	}

}
