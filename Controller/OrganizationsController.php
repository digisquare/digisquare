<?php
App::uses('AppController', 'Controller');

class OrganizationsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['index', 'view']);
	}

	public function index() {
		$conditions = ['Organization.type' => 0];
		$this->Paginator->settings['contain'] = ['Edition', 'Venue'];
		$this->Paginator->settings['order'] = ['Organization.recent_event_count' => 'DESC'];
		// Editions
		if (isset($this->request->query['edition_id'])) {
			$conditions['Organization.edition_id'] = $this->request->query['edition_id'];
		} else if (isset($this->request->params['slug'])) {
			$edition = $this->Organization->Edition->findBySlug($this->request->params['slug']);
			$conditions['Organization.edition_id'] = $edition['Edition']['id'];
			$this->set(compact('edition'));
		}
		// Page
		if (isset($this->request->params['?']['page'])) {
			$this->request->query['page'] = $this->request->params['?']['page'];
		}
		$this->Paginator->settings['conditions'] = $conditions;
		$organizations = $this->Paginator->paginate('Organization');
		$this->set([
			'organizations' => $organizations,
			'_serialize' => ['organizations']
		]);
		return $organizations;
	}

	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$organization = $this->Organization->find('first', [
			'contain' => ['Edition', 'Venue', 'Member' => 'User'],
			'conditions' => ['Organization.id' => $id]
		]);
		$this->set(compact('organization'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Organization->id]);
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$this->request->data = $this->request->query;
		}
		$venues = $this->Organization->Venue->find('list');
		$editions = $this->Organization->Edition->find('list');
		$this->set(compact('venues', 'editions'));
	}

	public function edit($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		if ($this->request->is(['post', 'put'])) {
			debug($this->request->data);
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Organization->id]);
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$organization = $this->Organization->find('first', [
				'contain' => false,
				'conditions' => ['Organization.id' => $id]
			]);
			if ($this->request->query('twitter')) {
				$this->request->data = $this->Organization->twitter($organization);
			} else {
				$this->request->data = $organization;
			}
		}
		$venues = $this->Organization->Venue->find('list');
		$editions = $this->Organization->Edition->find('list');
		$this->set(compact('venues', 'editions'));
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
		return $this->redirect(['action' => 'index']);
	}

	public function import() {
		if ($this->request->is('post')) {
			if (empty($this->request->data['Organization']['Contacts']['twitter'])) {
				$this->Session->setFlash(__('Please provide a twitter username.'), 'message_error');
				return $this->redirect(['action' => 'import']);
			}
			$organization = $this->Organization->twitter($this->request->data, true);
			$this->redirect(['action' => 'add', '?' => $organization]);
		}
		$venues = $this->Organization->Venue->find('list');
		$editions = $this->Organization->Edition->find('list');
		$this->set(compact('venues', 'editions'));
	}

	public function recount() {
		$organizations = $this->Organization->find('list');

		foreach ($organizations as $id => $name) {
			$this->Organization->updateEventCount($id);
		}

		die;
	}

}
