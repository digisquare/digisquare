<?php
App::uses('AppController', 'Controller');

class OrganizationsController extends AppController {

	public function index() {
		if (isset($this->request->params['slug'])) {
			$edition = $this->Organization->Edition->findBySlug($this->request->params['slug']);
			$conditions['Organization.edition_id'] = $edition['Edition']['id'];
			$this->set(compact('edition'));
		}
		$this->Paginator->settings['contain'] = ['Edition', 'Place'];
		$this->Paginator->settings['conditions'] = $conditions;
		$organizations = $this->Paginator->paginate();
		$this->set(compact('organizations'));
	}

	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$organization = $this->Organization->find('first', [
			'contain' => ['Edition', 'Place'],
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
		}
		$places = $this->Organization->Place->find('list');
		$editions = $this->Organization->Edition->find('list');
		$this->set(compact('places', 'editions'));
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
		return $this->redirect(['action' => 'index']);
	}

}
