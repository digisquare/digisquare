<?php
App::uses('AppController', 'Controller');

class TagsController extends AppController {

	public function index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$id && isset($this->request->params['slug'])) {
			$tag = $this->Tag->findBySlug($this->request->params['slug']);
			if (!$tag) {
				throw new NotFoundException(__('Invalid tag'));
			}
		} else {
			if (!$this->Tag->exists($id)) {
				throw new NotFoundException(__('Invalid tag'));
			}
			$tag = $this->Tag->find('first', [
				'contain' => false,
				'conditions' => ['Tag.id' => $id]
			]);
		}
		$this->set(compact('tag'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Tag->create();
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Tag->id]);
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'), 'message_error');
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Tag->id]);
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$this->request->data = $this->Tag->find('first', [
				'contain' => false,
				'conditions' => ['Tag.id' => $id]
			]);
		}
	}

	public function delete($id = null) {
		$this->Tag->id = $id;
		if (!$this->Tag->exists()) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tag->delete()) {
			$this->Session->setFlash(__('The tag has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The tag could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(['action' => 'index']);
	}
}
