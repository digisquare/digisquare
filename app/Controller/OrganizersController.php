<?php
App::uses('AppController', 'Controller');
/**
 * Organizers Controller
 *
 * @property Organizer $Organizer
 * @property PaginatorComponent $Paginator
 */
class OrganizersController extends AppController {

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
		$this->Organizer->recursive = 0;
		$this->set('organizers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Organizer->exists($id)) {
			throw new NotFoundException(__('Invalid organizer'));
		}
		$options = array('conditions' => array('Organizer.' . $this->Organizer->primaryKey => $id));
		$this->set('organizer', $this->Organizer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Organizer->create();
			if ($this->Organizer->save($this->request->data)) {
				$this->Session->setFlash(__('The organizer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizer could not be saved. Please, try again.'));
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
		if (!$this->Organizer->exists($id)) {
			throw new NotFoundException(__('Invalid organizer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Organizer->save($this->request->data)) {
				$this->Session->setFlash(__('The organizer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Organizer.' . $this->Organizer->primaryKey => $id));
			$this->request->data = $this->Organizer->find('first', $options);
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
		$this->Organizer->id = $id;
		if (!$this->Organizer->exists()) {
			throw new NotFoundException(__('Invalid organizer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organizer->delete()) {
			$this->Session->setFlash(__('The organizer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The organizer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
