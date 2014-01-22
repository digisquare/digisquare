<?php
App::uses('AppController', 'Controller');
/**
 * Startups Controller
 *
 * @property Startup $Startup
 * @property PaginatorComponent $Paginator
 */
class StartupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Startup->recursive = 0;
		$this->set('startups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$options = array('conditions' => array('Startup.' . $this->Startup->primaryKey => $id));
		$this->set('startup', $this->Startup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Startup->create();
			if ($this->Startup->save($this->request->data)) {
				$this->Session->setFlash(__('The startup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Startup->save($this->request->data)) {
				$this->Session->setFlash(__('The startup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Startup.' . $this->Startup->primaryKey => $id));
			$this->request->data = $this->Startup->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Startup->id = $id;
		if (!$this->Startup->exists()) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Startup->delete()) {
			$this->Session->setFlash(__('The startup has been deleted.'));
		} else {
			$this->Session->setFlash(__('The startup could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
