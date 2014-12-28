<?php
App::uses('AppController', 'Controller');

class EditionsController extends AppController {

	public function index() {
		$this->Edition->recursive = 0;
		$this->set('editions', $this->Paginator->paginate());
	}

	public function feed($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$edition = $this->Edition->find('first', array(
			'contain' => array(
				'Event' => array(
					'limit' => 10,
					'order' => array('Event.created' => 'DESC'),
				),
			),
			'conditions' => array('id' => $id)
		));
		$this->set(compact('edition'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function view($slug) {
		$edition = $this->Edition->findBySlug($slug);
		if (!$edition) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$this->set(compact('edition'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Edition->create();
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'message_error');
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Edition->save($this->request->data)) {
				$this->Session->setFlash(__('The edition has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edition could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Edition.' . $this->Edition->primaryKey => $id));
			$this->request->data = $this->Edition->find('first', $options);
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
		return $this->redirect(array('action' => 'index'));
	}
	
	public function organizations($slug) {
		$edition = $this->Edition->findBySlug($slug);
		$organizations = $this->Paginator->paginate('Organization', array(
			'Organization.edition_id' => $id
		));
		$this->set(compact('organizations'));
	}

	public function top() {
		$editions = $this->Edition->find('all', array(
			'fields' => array(
				'count(Event.edition_id) AS count',
				'Edition.id',
				'Edition.name',
				'Edition.created',
				'Edition.modified'
			),
			'joins' => array(
				array(
					'table' => 'events',
					'alias' => 'Event',
					'conditions' => 'Event.edition_id = Edition.id'
				)
			),
			'conditions' => 'Event.end_at > NOW()',
			'group' => 'Edition.id',
			'order' => 'count DESC',			
			'limit' => 10
		));
		$this->set(compact('editions'));
	}

	public function places($slug) {
		$edition = $this->Edition->findBySlug($slug);
		$event_place_ids = $this->Edition->Event->find('list', array(
			'fields' => array('Event.place_id', 'Event.place_id'),
			'conditions' => array('Event.edition_id' => $edition['Edition']['id'])
		));
		$organization_place_ids = $this->Edition->Organization->find('list', array(
			'fields' => array('Organization.place_id', 'Organization.place_id'),
			'conditions' => array('Organization.edition_id' => $edition['Edition']['id'])
		));
		$place_ids = array_merge($event_place_ids, $organization_place_ids);
		$this->loadModel('Place');
		$places = $this->Paginator->paginate('Place', array(
			'Place.id' => $place_ids
		));
		$this->set(compact('edition', 'places'));
	}
	
/**
 * Méthodes d'affiliation
 */

	public function watch($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '1',
				'model' => 'Editions',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Edition->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Edition->Affiliation->create();
			$this->Edition->Affiliation->save($affiliation);
		} else {
			$this->Edition->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'editions', 'action' => 'view', 'id' => $id));
	}

	public function like($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '2',
				'model' => 'Editions',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Edition->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Edition->Affiliation->create();
			$this->Edition->Affiliation->save($affiliation);
		} else {
			$this->Edition->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'editions', 'action' => 'view', 'id' => $id));
	}

	public function manage($id = null) {
		if (!$this->Edition->exists($id)) {
			throw new NotFoundException(__('Invalid edition'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '8',
				'model' => 'Editions',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Edition->Affiliation->find('all', array(
			'conditions' => $affiliation['Affiliation']
		));

		if ($affiliations == null) {
			$this->Edition->Affiliation->create();
			$this->Edition->Affiliation->save($affiliation);
		} else {
			$this->Edition->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'editions', 'action' => 'view', 'id' => $id));
	}

	public function reset() {
		$this->Edition->reset();
		$this->Session->setFlash(__('All is good in the world.'), 'message_success');
		return $this->redirect(array('action' => 'index'));
	}

}

