<?php
App::uses('AppController', 'Controller');

class VenuesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['index', 'view']);
	}

	public function index() {
		$conditions = [];
		$this->Paginator->settings['contain'] = ['Edition'];
		$this->Paginator->settings['order'] = ['Venue.event_count' => 'desc'];
		$this->Paginator->settings['findType'] = 'popular';
		// Editions
		if (isset($this->request->query['edition_id'])) {
			$conditions['Venue.edition_id'] = $this->request->query['edition_id'];
		} else if (isset($this->request->params['slug'])) {
			$edition = $this->Venue->Edition->findBySlug($this->request->params['slug']);
			$conditions['Venue.edition_id'] = $edition['Edition']['id'];
			$this->set(compact('edition'));
		}
		// Page
		if (isset($this->request->params['?']['page'])) {
			$this->request->query['page'] = $this->request->params['?']['page'];
		}
		$this->Paginator->settings['conditions'] = $conditions;
		$this->Paginator->settings['findMainOrganizers'] = true;
		$venues = $this->Paginator->paginate('Venue');
		$this->set([
			'venues' => $venues,
			'_serialize' => ['venues']
		]);
		return $venues;
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

	public function admin_index() {
		$conditions = [];
		$this->Paginator->settings['contain'] = ['Edition'];
		$this->Paginator->settings['order'] = ['Venue.name' => 'asc'];
		// Editions
		if (isset($this->request->query['edition_id'])) {
			$conditions['Venue.edition_id'] = $this->request->query['edition_id'];
		} else if (isset($this->request->params['slug'])) {
			$edition = $this->Venue->Edition->findBySlug($this->request->params['slug']);
			$conditions['Venue.edition_id'] = $edition['Edition']['id'];
			$this->set(compact('edition'));
		} else if ($this->Session->check('Edition')) {
			$conditions['Venue.edition_id'] = $this->Session->read('Edition.id');
		}
		// Page
		if (isset($this->request->params['?']['page'])) {
			$this->request->query['page'] = $this->request->params['?']['page'];
		}
		$this->Paginator->settings['conditions'] = $conditions;
		$venues = $this->Paginator->paginate('Venue');
		$this->set(compact('venues'));
	}

	public function admin_add() {
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

	public function admin_edit($id = null) {
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

	public function admin_delete($id = null) {
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

	public function admin_merge() {
		if ($this->request->is('post') && isset($this->request->data['Venue']['merge'])) {
			if ($this->Venue->merge($this->request->data)) {
				$this->Session->setFlash(__('The venues were merged.'), 'message_success');
				return $this->redirect(['action' => 'merge']);
			} else {
				$this->Session->setFlash(__('The venues could not be merged. Please, try again.'), 'message_error');
			}
		} else if ($this->request->is('post')) {
			if ($this->request->data['Venue']['venue_id_1'] > $this->request->data['Venue']['venue_id_2']) {
				$temp_venue_id = $this->request->data['Venue']['venue_id_1'];
				$this->request->data['Venue']['venue_id_1'] = $this->request->data['Venue']['venue_id_2'];
				$this->request->data['Venue']['venue_id_2'] = $temp_venue_id;
			} elseif ($this->request->data['Venue']['venue_id_1'] == $this->request->data['Venue']['venue_id_2']) {
				$this->Session->setFlash(__('You have to merge two different venues. Please, try again.'), 'message_error');
				return $this->redirect(['action' => 'merge']);
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
		$venues = $this->Venue->find(
			'list',
			[
				'conditions' => [
					'Venue.edition_id' => $this->Session->read('Edition.id')
				],
				'order' => [
					'Venue.name' => 'ASC'
				]
			]
		);
		$editions = $this->Venue->Edition->find('list');
		$this->set(compact('venues', 'editions'));
	}

}
