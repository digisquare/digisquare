<?php
App::uses('AppController', 'Controller');

class PlacesController extends AppController {

	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

	public function feed(){
		$places = $this->Place->find('all', array(
			'contain' => array(),
			'limit' => 10,
			'order' => array('Place.created' => 'DESC'),
		));
		$this->set(compact('places'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$user = $this->Session->read("Auth.User");
		if ($user != null){
			$affiliations = $this->Place->Affiliation->find("all", array(
					'conditions' => array(
						'Affiliation.foreign_key' => $id,
						'Affiliation.user_id' => $user['id'],
						'Affiliation.model' => 'Places'
					)
				)
			);
			$this->set('affiliations', $affiliations);
		}		
		$this->set('userid', $user['id']);
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Place->Edition->find('list');
		$this->set(compact('editions'));
	}

	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function top() {
		$places = $this->Place->find('all', array(
			'fields' => array(
				'count(Event.place_id) AS count',
				'Place.id',
				'City.name',
				'Place.name',
				'Place.created',
				'Place.modified'
			),
			'conditions' => 'Event.end_at > NOW()',
			'limit' => 10,
			'joins' => array(
				array(
					'table' => 'events',
					'alias' => 'Event',
					'conditions' => 'Event.place_id = Place.id'
				),
				array(
					'table' => 'editions',
					'alias' => 'City',
					'conditions' => 'City.id = Place.edition_id'
				)
			),
			'group' => 'Place.id',
			'order' => 'count DESC'
		));
		$this->set(compact('places'));
	}
	
	public function organizations($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$organizations = $this->Paginator->paginate('Organization', array('Organization.place_id' => $id));	
		$this->set(compact('organizations'));
	}

/**
 * Méthodes d'affiliation
 */

	public function watch($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '1',
				'model' => 'Places',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Place->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Place->Affiliation->create();
			$this->Place->Affiliation->save($affiliation);
		} else {
			$this->Place->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'places', 'action' => 'view', 'id' => $id));
	}

	public function like($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '2',
				'model' => 'Places',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Place->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Place->Affiliation->create();
			$this->Place->Affiliation->save($affiliation);
		} else {
			$this->Place->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'places', 'action' => 'view', 'id' => $id));
	}
	
	public function visit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '4',
				'model' => 'Places',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Place->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Place->Affiliation->create();
			$this->Place->Affiliation->save($affiliation);
		} else {
			$this->Place->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'places', 'action' => 'view', 'id' => $id));
	}

	public function run($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '7',
				'model' => 'Places',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Place->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Place->Affiliation->create();
			$this->Place->Affiliation->save($affiliation);
		} else {
			$this->Place->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'places', 'action' => 'view', 'id' => $id));
	}

	public function manage($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '8',
				'model' => 'Places',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Place->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Place->Affiliation->create();
			$this->Place->Affiliation->save($affiliation);
		} else {
			$this->Place->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'places', 'action' => 'view', 'id' => $id));
	}

	public function merge() {
		if ($this->request->is('post') && isset($this->request->data['Place']['merge'])) {
			if ($this->Place->merge($this->request->data)) {
				$this->Session->setFlash(__('The places were merged.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The places could not be merged. Please, try again.'), 'message_error');
			}
		} else if ($this->request->is('post')) {
			if ($this->request->data['Place']['place_id_1'] > $this->request->data['Place']['place_id_2']) {
				$temp_place_id = $this->request->data['Place']['place_id_1'];
				$this->request->data['Place']['place_id_1'] = $this->request->data['Place']['place_id_2'];
				$this->request->data['Place']['place_id_2'] = $temp_place_id;
			}
			$place_1 = $this->Place->find('first', array(
				'contain' => array(),
				'conditions' => array(
					'Place.id' => $this->request->data['Place']['place_id_1']
				)
			));
			$place_2 = $this->Place->find('first', array(
				'contain' => array(),
				'conditions' => array(
					'Place.id' => $this->request->data['Place']['place_id_2']
				)
			));
			$this->set(compact('place_1', 'place_2'));
		}
		$places = $this->Place->find('list', array('order' => array('Place.name' => 'ASC')));
		$this->set(compact('places'));
	}
}
