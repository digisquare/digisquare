<?php
App::uses('AppController', 'Controller');

class StartupsController extends AppController {

	public function index() {
		$this->Startup->recursive = 0;
		$this->set('startups', $this->Paginator->paginate());
	}

	public function feed() {
		$startups = $this->Startup->find('all', array(
			'contain' => array(),
			'limit' => 10,
			'order' => array('Startup.created' => 'DESC')
		));
		$this->set(compact('startups'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function view($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$options = array('conditions' => array('Startup.' . $this->Startup->primaryKey => $id));
		$this->set('startup', $this->Startup->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Startup->create();
			if ($this->Startup->save($this->request->data)) {
				$this->Session->setFlash(__('The startup has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup could not be saved. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Startup->Edition->find('list');
		$tags = $this->Startup->Tag->find('list');
		$this->set(compact('editions', 'tags'));
	}

	public function edit($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Startup->save($this->request->data)) {
				$this->Session->setFlash(__('The startup has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Startup.' . $this->Startup->primaryKey => $id));
			$this->request->data = $this->Startup->find('first', $options);
		}
		$editions = $this->Startup->Edition->find('list');
		$tags = $this->Startup->Tag->find('list');
		$this->set(compact('editions', 'tags'));
	}

	public function delete($id = null) {
		$this->Startup->id = $id;
		if (!$this->Startup->exists()) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Startup->delete()) {
			$this->Session->setFlash(__('The startup has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The startup could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
