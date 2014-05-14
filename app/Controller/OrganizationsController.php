<?php
App::uses('AppController', 'Controller');

class OrganizationsController extends AppController {

	public function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$user = $this->Session->read("Auth.User");
		if ($user != null){
			$affiliations = $this->Organization->Affiliation->find("all", array(
					'conditions' => array(
						'Affiliation.foreign_key' => $id,
						'Affiliation.user_id' => $user['id'],
						'Affiliation.model' => 'Organizations'
					)
				)
			);
			$this->set('affiliations', $affiliations);
		}		
		$this->set('userid', $user['id']);
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
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
		return $this->redirect(array('action' => 'index'));
	}

	public function top() {
		$organizations = $this->Organization->find('all', array(
			'fields' => array(
				'count(Orga.id) AS count',
				'Organization.id',
				'Organization.name',
				'Organization.created',
				'Organization.modified'
			),
			'joins' => array(
				array(
					'table' => 'organizers',
					'alias' => 'Orga',
					'conditions' => 'Orga.organization_id = Organization.id'
				)
			),
			'group' => 'Organization.id',
			'order' => 'count DESC',   
			'limit' => 10
		));
		$this->set('organizations', $organizations);
	}

	public function feed() {
		$organizations = $this->Organization->find('all', array(
			'limit' => 10,
			'order' => array('Organization.created' => 'DESC')
		));
		$this->set(compact('organizations'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function register($id = null){
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__('Invalid organization'));	
		}
		$member = array(
			'Member' => array(
				'organization_id' => $id,
				'user_id' => $this->Auth->user('id')
			)
		);
		if ($this->Organization->Member->save($member)) {
			$this->Session->setFlash(__('Your registration to this organization has been saved.'));
		} else {
			$this->Session->setFlash(__('Your registration to this organization could not been saved. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function pastevents($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$event_ids = $this->Organization->Organizer->find('list', array(
			'fields' => array('Organizer.event_id'),
			'conditions' => array('Organizer.organization_id' => $id)
		));
		$this->loadModel('Event');
		$this->Paginator->settings = array(
			'Event' => array(
				'contain' => array('Edition', 'Place'),
			),
		);
		$events = $this->Paginator->paginate('Event', array(
			'Event.id' => $event_ids,
			'Event.end_at < NOW()',
		));
		$this->set(compact('events'));
	}
	
/**
* Méthodes d'affiliation
*/

	public function watch($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '1',
				'model' => 'Organizations',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Organization->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Organization->Affiliation->create();
			$this->Organization->Affiliation->save($affiliation);
		} else {
			$this->Organization->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'organizations', 'action' => 'view', 'id' => $id));
	}

	public function like($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '2',
				'model' => 'Organizations',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Organization->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Organization->Affiliation->create();
			$this->Organization->Affiliation->save($affiliation);
		} else {
			$this->Organization->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'organizations', 'action' => 'view', 'id' => $id));
	}

	public function enroll($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '4',
				'model' => 'Organizations',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Organization->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Organization->Affiliation->create();
			$this->Organization->Affiliation->save($affiliation);
		} else {
			$this->Organization->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'organizations', 'action' => 'view', 'id' => $id));
	}
	

	public function run($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '7',
				'model' => 'Organizations',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Organization->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Organization->Affiliation->create();
			$this->Organization->Affiliation->save($affiliation);
		} else {
			$this->Organization->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'organizations', 'action' => 'view', 'id' => $id));
	}

	public function manage($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '8',
				'model' => 'Organizations',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Organization->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Organization->Affiliation->create();
			$this->Organization->Affiliation->save($affiliation);
		} else {
			$this->Organization->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'organizations', 'action' => 'view', 'id' => $id));
	}
}
