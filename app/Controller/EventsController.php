<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {

	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$participant = array(
			'Participant' => array(
				'event_id' => $id,
				'user_id' => $this->Auth->user('id')
			)
		);
		$user_participant = $this->Event->Participant->find('all', array(
			'fields' => array(
				'count(Participant.id) AS count'
			),
			'conditions' => array(
				'Participant.event_id' => $participant['Participant']['event_id'],
				'Participant.user_id' => $participant['Participant']['user_id']
			)
		));
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
		$this->set('user_participant', $user_participant);
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

	public function participate($id = null, $participation){
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
		if ($participation == 0){
			$exist_participant = $this->Event->Participant->find('all', array(
				'fields' => array(
					'(Participant.id)'
				),
				'conditions' => array(
					'Participant.event_id' => $participant['Participant']['event_id'],
					'Participant.user_id' => $participant['Participant']['user_id']
				)
			));
			if ($this->Event->Participant->delete($exist_participant[0]['Participant']['id'])) {
				$this->Session->setFlash(__('Your participation to this event has been removed.'), 'message_success');
			} else {
				$this->Session->setFlash(__('Your participation to this event could not been removed. Please, try again.'), 'message_error');
			}
		} else {
			if ($this->Event->Participant->save($participant)) {
				$this->Session->setFlash(__('Your participation to this event has been saved.'), 'message_success');
			} else {
				$this->Session->setFlash(__('Your participation to this event could not been saved. Please, try again.'), 'message_error');
			}
		}
		
		return $this->redirect(array('id' => $id, 'action' => 'view'));
	}

	public function feed(){
		$events = $this->Event->find('all', array(
			'contain' => array(),
			'limit' => 10,
			'order' => array('Event.created' => 'DESC'),
		));
		$this->set(compact('events'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

}
