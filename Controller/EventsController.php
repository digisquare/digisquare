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
		if (isset($this->request->query['organization_id'])) {
			$event_ids = $this->Event->Organizer->find('list', [
				'fields' => 'event_id',
				'conditions' => ['organization_id' => $this->request->query['organization_id']]
			]);
			$conditions['Event.id'] = $event_ids;
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
				$conditions['OR'] = [
					'Event.start_at BETWEEN ? AND ?' => [
						date('Y-m-01 00:00:00', $date),
						date('Y-m-t 23:59:00', $date)
					],
					'Event.end_at BETWEEN ? AND ?' => [
						date('Y-m-01 00:00:00', $date),
						date('Y-m-t 23:59:00', $date)
					]
				];
			} else if (10 == strlen($this->request->query['date'])) {
				$conditions['OR'] = [
					'Event.start_at BETWEEN ? AND ?' => [
						date('Y-m-d 00:00:00', $date),
						date('Y-m-d 23:59:00', $date)
					],
					'Event.end_at BETWEEN ? AND ?' => [
						date('Y-m-d 00:00:00', $date),
						date('Y-m-d 23:59:00', $date)
					]
				];
			}
		}
		$this->Paginator->settings['contain'] = ['Edition', 'Place'];
		$this->Paginator->settings['conditions'] = $conditions;
		$this->Paginator->settings['order'] = ['Event.created' => 'desc'];
		$events = $this->Paginator->paginate('Event');
		$this->set([
			'events' => $events,
			'_serialize' => ['events']
		]);
		return $events;
	}

	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$event = $this->Event->find('first', [
			'contain' => ['Edition', 'Place', 'Organization'],
			'conditions' => ['Event.id' => $id]
		]);
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
				return $this->redirect(['action' => 'view', 'id' => $this->Event->id]);
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Event->Edition->find('list');
		$places = $this->Event->Place->find('list');
		$organizations = $this->Event->Organization->find('list');
		$this->set(compact('editions', 'places', 'organizations'));
	}

	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Event->id]);
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$this->request->data = $this->Event->find('first', [
				'contain' => ['Organization'],
				'conditions' => ['Event.id' => $id]
			]);
		}
		$editions = $this->Event->Edition->find('list');
		$places = $this->Event->Place->find('list');
		$organizations = $this->Event->Organization->find('list');
		$this->set(compact('editions', 'places', 'organizations'));
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
		return $this->redirect(['action' => 'index']);
	}

	public function upload() {
		if ($this->request->is('post')) {

			if (empty($this->request->data['Event']['file']['tmp_name'])) {
				$this->Session->setFlash(__('Please select a file.'), 'message_error');
				return $this->redirect(['action' => 'upload']);
			}

			try {
				$file = new File($this->request->data['Event']['file']['tmp_name']);
				$contents = $file->read();
				$vCalendar = Sabre\VObject\Reader::read($contents, Sabre\VObject\Reader::OPTION_FORGIVING);
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage(), 'message_error');
				return $this->redirect(['action' => 'upload']);
			}

			$events = $this->Event->parseVCalendar($vCalendar, $this->request->data['Event']['edition_id']);

			if ($this->Event->saveAll($events)) {
				$this->Session->setFlash(__('The events have been saved.'), 'message_success');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Session->setFlash(__('The events could not be saved. Please, try again.'), 'message_error');
			}

		}

		$editions = $this->Event->Edition->find('list');
		$this->set(compact('editions'));

	}

}
