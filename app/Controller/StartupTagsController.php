<?php
App::uses('AppController', 'Controller');
/**
 * StartupTags Controller
 *
 * @property StartupTag $StartupTag
 * @property PaginatorComponent $Paginator
 */
class StartupTagsController extends AppController {

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
		$this->StartupTag->recursive = 0;
		$this->set('startupTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StartupTag->exists($id)) {
			throw new NotFoundException(__('Invalid startup tag'));
		}
		$options = array('conditions' => array('StartupTag.' . $this->StartupTag->primaryKey => $id));
		$this->set('startupTag', $this->StartupTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StartupTag->create();
			if ($this->StartupTag->save($this->request->data)) {
				$this->Session->setFlash(__('The startup tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup tag could not be saved. Please, try again.'));
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
		if (!$this->StartupTag->exists($id)) {
			throw new NotFoundException(__('Invalid startup tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StartupTag->save($this->request->data)) {
				$this->Session->setFlash(__('The startup tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StartupTag.' . $this->StartupTag->primaryKey => $id));
			$this->request->data = $this->StartupTag->find('first', $options);
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
		$this->StartupTag->id = $id;
		if (!$this->StartupTag->exists()) {
			throw new NotFoundException(__('Invalid startup tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StartupTag->delete()) {
			$this->Session->setFlash(__('The startup tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The startup tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StartupTag->recursive = 0;
		$this->set('startupTags', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StartupTag->exists($id)) {
			throw new NotFoundException(__('Invalid startup tag'));
		}
		$options = array('conditions' => array('StartupTag.' . $this->StartupTag->primaryKey => $id));
		$this->set('startupTag', $this->StartupTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StartupTag->create();
			if ($this->StartupTag->save($this->request->data)) {
				$this->Session->setFlash(__('The startup tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup tag could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StartupTag->exists($id)) {
			throw new NotFoundException(__('Invalid startup tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StartupTag->save($this->request->data)) {
				$this->Session->setFlash(__('The startup tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The startup tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StartupTag.' . $this->StartupTag->primaryKey => $id));
			$this->request->data = $this->StartupTag->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StartupTag->id = $id;
		if (!$this->StartupTag->exists()) {
			throw new NotFoundException(__('Invalid startup tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StartupTag->delete()) {
			$this->Session->setFlash(__('The startup tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The startup tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
