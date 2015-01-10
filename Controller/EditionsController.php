<?php
App::uses('AppController', 'Controller');

class EditionsController extends AppController {

	public function index() {
		$this->Edition->recursive = 0;
		$this->set('editions', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$id && isset($this->request->params['slug'])) {
			$edition = $this->Edition->findBySlug($this->request->params['slug']);
			if (!$edition) {
				throw new NotFoundException(__('Invalid edition'));
			}
		} else {
			if (!$this->Edition->exists($id)) {
				throw new NotFoundException(__('Invalid edition'));
			}
			$edition = $this->Edition->find('first', [
				'contain' => false,
				'conditions' => ['Edition.id' => $id]
			]);
		}
		$this->set(compact('edition'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Edition->create();
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Edition->id]);
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'message_error');
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Edition->id]);
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$this->request->data = $this->Edition->find('first', [
				'contain' => false,
				'conditions' => ['Edition.id' => $id]
			]);
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
		return $this->redirect(['action' => 'index']);
	}
	
	public function reset() {
		$this->Edition->reset();
		$this->Session->setFlash(__('All is good in the world.'), 'message_success');
		return $this->redirect(['action' => 'index']);
	}

}
