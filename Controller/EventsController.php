<?php
App::uses('AppController', 'Controller');
App::uses('Sabre','application.vendors.Sabre');


class EventsController extends AppController {

	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read("Auth.User");
		if ($user != null){
			$affiliations = $this->Event->Affiliation->find("all", array(
					'conditions' => array(
						'Affiliation.foreign_key' => $id,
						'Affiliation.user_id' => $user['id'],
						'Affiliation.model' => 'Events'
					)
				)
			);
			$this->set('affiliations', $affiliations);
		}		
		$this->set('userid', $user['id']);
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Event->Edition->find('list');
		$places = $this->Event->Place->find('list');
		$tags = $this->Event->Tag->find('list');
		$this->set(compact('editions', 'places', 'tags'));
	}

	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$editions = $this->Event->Edition->find('list');
		$places = $this->Event->Place->find('list');
		$tags = $this->Event->Tag->find('list');
		$this->set(compact('editions', 'places', 'tags'));
	}

	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('The event has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function participate($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$participant = array(
			'Participant' => array(
				'event_id' => $id,
				'user_id' => $this->Auth->user('id')
			)
		);
		if ($this->Event->Participant->save($participant)) {
			$this->Session->setFlash(__('Your participation to this event has been saved.'), 'message_success');
		} else {
			$this->Session->setFlash(__('Your participation to this event could not been saved. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function feed() {
		$events = $this->Event->find('all', array(
			'contain' => array(),
			'limit' => 10,
			'order' => array('Event.created' => 'DESC'),
		));
		$this->set(compact('events'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

/**
 * Méthodes d'affiliation
 */

	public function watch($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '1',
				'model' => 'Events',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation);
		} else {
			$this->Event->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function like($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '2',
				'model' => 'Events',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation);
		} else {
			$this->Event->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function miss($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');

		$affiliation_Miss = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'model' => 'Events',
				'foreign_key' => $id,
				'status' => '3'
			)
		);
		$affiliation_Att_Myb = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'model' => 'Events',
				'foreign_key' => $id,
				'or' => array( 
					array('status' => '4'),
					array('status' => '5')
				)
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
			'conditions' => $affiliation_Miss['Affiliation']
			)
		);


		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation_Miss);
			$this->Event->Affiliation->deleteAll($affiliation_Att_Myb['Affiliation']);	
		} else {
			$this->Event->Affiliation->deleteAll($affiliation_Miss['Affiliation']);
			$this->Event->Affiliation->deleteAll($affiliation_Att_Myb['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function attend($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');

		$affiliation_Att = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'model' => 'Events',
				'foreign_key' => $id,
				'status' => '4'
			)
		);
		$affiliation_Miss_Att_Myb = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'model' => 'Events',
				'foreign_key' => $id,
				'or' => array( 
					array('status' => '3'),
					array('status' => '5')
				)
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
			'conditions' => $affiliation_Att['Affiliation']
			)
		);


		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation_Att);
			$this->Event->Affiliation->deleteAll($affiliation_Miss_Att_Myb['Affiliation']);	
		} else {
			$this->Event->Affiliation->deleteAll($affiliation_Att['Affiliation']);
			$this->Event->Affiliation->deleteAll($affiliation_Miss_Att_Myb['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function attend_maybe($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');

		$affiliation_Att_Myb = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'model' => 'Events',
				'foreign_key' => $id,
				'status' => '5'
			)
		);
		$affiliation_Miss_Att = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'model' => 'Events',
				'foreign_key' => $id,
				'or' => array( 
					array('status' => '3'),
					array('status' => '4')
				)
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
			'conditions' => $affiliation_Att_Myb['Affiliation']
			)
		);


		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation_Att_Myb);
			$this->Event->Affiliation->deleteAll($affiliation_Miss_Att['Affiliation']);	
		} else {
			$this->Event->Affiliation->deleteAll($affiliation_Att_Myb['Affiliation']);
			$this->Event->Affiliation->deleteAll($affiliation_Miss_Att['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function speak_at($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '6',
				'model' => 'Events',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation);
		} else {
			$this->Event->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function organize($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '7',
				'model' => 'Events',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation);
		} else {
			$this->Event->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function manage($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$user = $this->Session->read('Auth.User');
		$affiliation = array(
			'Affiliation' => array(
				'user_id'	=>	$user['id'],
				'status' => '8',
				'model' => 'Events',
				'foreign_key' => $id
			)
		);

		$affiliations = $this->Event->Affiliation->find('all', array(
				'conditions' => $affiliation['Affiliation']
				)
		);

		if ($affiliations == null) {
			$this->Event->Affiliation->create();
			$this->Event->Affiliation->save($affiliation);
		} else {
			$this->Event->Affiliation->deleteAll($affiliation['Affiliation']);
		}

		return $this->redirect(array('controller' => 'events', 'action' => 'view', 'id' => $id));
	}

	public function upload() {
		if ($this->request->is('post')) {

			if (empty($this->request->data['Event']['ical_file']['tmp_name'])) {
				$this->Session->setFlash(__('Please select a file.'), 'message_error');
				return $this->redirect(array('action' => 'upload'));
			}

			try {
				$file = new File($this->request->data['Event']['ical_file']['tmp_name']);
				$contents = $file->read();
				$calendar = Sabre\VObject\Reader::read($contents, Sabre\VObject\Reader::OPTION_FORGIVING);
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage(), 'message_error');
				return $this->redirect(array('action' => 'upload'));
			}

			foreach($calendar->VEVENT as $vevent) {
				$location = $vevent->LOCATION;
				$events[] = array(
					'Event' => array(
						'edition_id' => 1,
						'place_id' => 0,
						'name' => (string)$vevent->SUMMARY,
						'description' => (string)$vevent->DESCRIPTION,
						'start_at' => (string)$vevent->DTSTART->getDateTime()->format('Y-m-d H:i:s'),
						'end_at' => (string)$vevent->DTEND->getDateTime()->format('Y-m-d H:i:s'),
						'status' => '0',
						'url' => (string)$vevent->URL
					)
				);
			}

			die(debug($events));

			$this->Event->create();
			if ($this->Event->saveAll($events)) {
				$this->Session->setFlash(__('The event has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {		
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
				return $this->redirect(array('action' => 'index'));
			}

		}

		$editions = $this->Event->Edition->find('list');
		$this->set(compact('editions'));

	}

}
