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
		$user = $this->Session->read("Auth.User");
		if ($user != null){
			$affiliations = $this->Startup->Affiliation->find("all", array(
					'conditions' => array(
						'Affiliation.foreign_key' => $id,
						'Affiliation.user_id' => $user['id'] 
					)
				)
			);
			$this->set('affiliations', $affiliations);
		}		
		$this->set('userid', $user['id']);
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

/**
* Méthodes d'affiliation
*/

	public function watch($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '1',
				'model' => 'Startups',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Startup->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Startup->Affiliation->create();
			$this->Startup->Affiliation->save($affiliation);
		} else {
			$this->Startup->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'startups', 'action' => 'view', 'id' => $id));
	}

	public function like($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '2',
				'model' => 'Startups',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Startup->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Startup->Affiliation->create();
			$this->Startup->Affiliation->save($affiliation);
		} else {
			$this->Startup->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'startups', 'action' => 'view', 'id' => $id));
	}

	public function work_for($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '4',
				'model' => 'Startups',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Startup->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Startup->Affiliation->create();
			$this->Startup->Affiliation->save($affiliation);
		} else {
			$this->Startup->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'startups', 'action' => 'view', 'id' => $id));
	}
	
	public function advise($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '6',
				'model' => 'Startups',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Startup->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Startup->Affiliation->create();
			$this->Startup->Affiliation->save($affiliation);
		} else {
			$this->Startup->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'startups', 'action' => 'view', 'id' => $id));
	}

	public function run($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '7',
				'model' => 'Startups',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Startup->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Startup->Affiliation->create();
			$this->Startup->Affiliation->save($affiliation);
		} else {
			$this->Startup->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'startups', 'action' => 'view', 'id' => $id));
	}

	public function manage($id = null) {
		if (!$this->Startup->exists($id)) {
			throw new NotFoundException(__('Invalid startup'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '8',
				'model' => 'Startups',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Startup->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Startup->Affiliation->create();
			$this->Startup->Affiliation->save($affiliation);
		} else {
			$this->Startup->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'startups', 'action' => 'view', 'id' => $id));
	}
}