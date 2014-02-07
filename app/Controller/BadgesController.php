<?php
App::uses('AppController', 'Controller');
/**
 * Badges Controller
 *
 * @property Badge $Badge
 * @property PaginatorComponent $Paginator
 */
class BadgesController extends AppController {

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
		$this->Badge->recursive = 0;
		$badges = $this->Paginator->paginate();

		$this->loadModel('Edition');
		$this->loadModel('Startup');
		$this->loadModel('Place');
		
		foreach ($badges as $key => $badge):
			$badges[$key]['Badge']['class_badged'] = 'notBadged';
			$type = $badge['Badge']['type'];
			$minimum = $badge['Badge']['minimum'];
			$options = array('conditions' => array($type.'name' => ''));
			if($type == "Edition"){
				$total = $this->Edition->find('count');
			}
			else if($type == "Startup"){
				$total = $this->Startup->find('count');
			}
			if($type == "Place"){
				$total = $this->Place->find('count');
			}
			
        	if ($total >= $minimum){
				$badges[$key]['Badge']['class_badged'] = 'Badged';
        	}
		endforeach;
		
				
		$this->set(compact('badges'));
	}
/**
 * manage method
 *
 * @return void
 */
	public function manage() {
		$this->Badge->recursive = 0;
		$this->set('badges', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Badge->exists($id)) {
			throw new NotFoundException(__('Invalid badge'));
		}
		$options = array('conditions' => array('Badge.' . $this->Badge->primaryKey => $id));
		$this->set('badge', $this->Badge->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Badge->create();
			if ($this->Badge->save($this->request->data)) {
				$this->Session->setFlash(__('The badge has been saved.'));
				return $this->redirect(array('action' => 'manage'));
			} else {
				$this->Session->setFlash(__('The badge could not be saved. Please, try again.'));
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
		if (!$this->Badge->exists($id)) {
			throw new NotFoundException(__('Invalid badge'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Badge->save($this->request->data)) {
				$this->Session->setFlash(__('The badge has been saved.'));
				return $this->redirect(array('action' => 'manage'));
			} else {
				$this->Session->setFlash(__('The badge could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Badge.' . $this->Badge->primaryKey => $id));
			$this->request->data = $this->Badge->find('first', $options);
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
		$this->Badge->id = $id;
		if (!$this->Badge->exists()) {
			throw new NotFoundException(__('Invalid badge'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Badge->delete()) {
			$this->Session->setFlash(__('The badge has been deleted.'));
		} else {
			$this->Session->setFlash(__('The badge could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'manage'));
	}}
