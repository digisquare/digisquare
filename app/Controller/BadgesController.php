<?php
App::uses('AppController', 'Controller');

class BadgesController extends AppController {

	public function index() {
		$this->Badge->recursive = 0;
		$badges = $this->Paginator->paginate();

		$this->loadModel('Edition');
		$this->loadModel('Startup');
		$this->loadModel('Place');
		$this->loadModel('Participant');
		
		foreach ($badges as $key => $badge):
			$badges[$key]['Badge']['class_badged'] = 'notBadged';
			$type = $badge['Badge']['type'];
			$minimum = $badge['Badge']['minimum'];
			$total = 0;
			if($type == "Edition"){
				$total = $this->Edition->find('count');
			}
			else if($type == "Startup"){
				$total = $this->Startup->find('count');
			}
			else if($type == "Participant"){
				$options = array('conditions' => array('Participant.user_id' => $this->Session->read('Auth.User.id')));
				$total = $this->Participant->find('count');
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

	public function manage() {
		$this->Badge->recursive = 0;
		$this->set('badges', $this->Paginator->paginate());
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Badge->create();
						
			if(!empty($this->request->data['Badge']['file']))
			{
			 	$filename = WWW_ROOT.'img'.DS.'badges'.DS.$this->request->data['Badge']['icon']; 
			 	move_uploaded_file($this->request->data['Badge']['file']['tmp_name'],$filename);
			}
			if ($this->Badge->save($this->request->data)) {
				$this->Session->setFlash(__('The badge has been saved.'));
				return $this->redirect(array('action' => 'manage'));
			} else {
				$this->Session->setFlash(__('The badge could not be saved. Please, try again.'));
			}
		}
	}

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
