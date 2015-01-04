<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {

	public function index() {
		$conditions = [];
		if (isset($this->request->query['place_id'])) {
			$conditions['Event.place_id'] = $this->request->query['place_id'];
		}
		if (isset($this->request->query['edition_id'])) {
			$conditions['Event.edition_id'] = $this->request->query['edition_id'];
		}
		if (isset($this->request->query['start_at'])) {
			$conditions['Event.start_at <'] = $this->request->query['start_at'];
		}
		if (isset($this->request->query['end_at'])) {
			$conditions['Event.end_at >'] = $this->request->query['end_at'];
		}
		if (isset($this->request->query['date'])) {
			$date = strtotime($this->request->query['date']);
			if (7 == strlen($this->request->query['date'])) {
				$conditions['Event.start_at <'] = date('Y-m-t 23:59:00', $date);
				$conditions['Event.end_at >'] = date('Y-m-01 00:00:00', $date);
			} else if (10 == strlen($this->request->query['date'])) {
				$conditions['Event.start_at <'] = date('Y-m-d 23:59:00', $date);
				$conditions['Event.end_at >'] = date('Y-m-d 00:00:00', $date);
			}
		}
		$this->Paginator->settings['contain'] = ['Edition', 'Place'];
		$this->Paginator->settings['conditions'] = $conditions;
		$events = $this->Paginator->paginate('Event');
		$this->set(array(
			'events' => $events,
			'_serialize' => array('events')
		));
		return $events;
	}

	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$event = $this->Event->find('first', [
			'contain' => ['Edition', 'Place'],
			'conditions' => ['Event.id' => $id]
		]);
		$event['Place']['oneliner'] = $this->Event->Place->implode($event);
		$this->set(compact('event'));
	}

	public function add() {
		if ($this->request->is('post')) {
			if (empty($this->request->data['Event']['place_id']) && !empty($this->request->data['Place']['name'])) {
				$this->request->data['Event']['place_id'] = $this->Event->Place->findOrCreate($this->request->data);
				unset($this->request->data['Place']);
			}
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

	public function feed() {
		$events = $this->Event->find('all', array(
			'contain' => array(),
			'limit' => 10,
			'order' => array('Event.created' => 'DESC'),
		));
		$this->set(compact('events'));
		$this->RequestHandler->renderAs($this, 'rss');
	}

	public function upload() {
		if ($this->request->is('post')) {

			if (empty($this->request->data['Event']['file']['tmp_name'])) {
				$this->Session->setFlash(__('Please select a file.'), 'message_error');
				return $this->redirect(array('action' => 'upload'));
			}

			try {
				$file = new File($this->request->data['Event']['file']['tmp_name']);
				$contents = $file->read();
				$vCalendar = Sabre\VObject\Reader::read($contents, Sabre\VObject\Reader::OPTION_FORGIVING);
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage(), 'message_error');
				return $this->redirect(array('action' => 'upload'));
			}

			$events = $this->Event->parseVCalendar($vCalendar, $this->request->data['Event']['edition_id']);

			if ($this->Event->saveAll($events)) {
				$this->Session->setFlash(__('The events have been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events could not be saved. Please, try again.'), 'message_error');
			}

		}

		$editions = $this->Event->Edition->find('list');
		$this->set(compact('editions'));

	}

}
