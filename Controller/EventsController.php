<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['index', 'view']);
		$this->Security->unlockedActions = ['add', 'edit'];
	}

	public function index() {
		$conditions = [];
		$this->Paginator->settings['contain'] = ['Edition', 'Venue', 'Organization'];
		$this->Paginator->settings['order'] = ['Event.start_at' => 'desc'];
		// Venues
		if (isset($this->request->query['venue_id'])) {
			$conditions['Event.venue_id'] = $this->request->query['venue_id'];
		} else if (isset($this->request->params['venue_id'])) {
			$venue = $this->Event->Venue->find('first', [
				'contain' => ['Edition'],
				'conditions' => ['Venue.id' => $this->request->params['venue_id']]
			]);
			$conditions['Event.venue_id'] = $this->request->params['venue_id'];
			$this->set(compact('venue'));
		}
		// Editions
		if (isset($this->request->query['edition_id'])) {
			$conditions['Event.edition_id'] = $this->request->query['edition_id'];
		} else if (isset($this->request->params['slug'])) {
			$edition = $this->Event->Edition->findBySlug($this->request->params['slug']);
			$conditions['Event.edition_id'] = $edition['Edition']['id'];
			$this->set(compact('edition'));
		}
		//Organizations
		if (isset($this->request->query['organization_id'])) {
			$event_ids = $this->Event->Organizer->find('list', [
				'fields' => 'event_id',
				'conditions' => ['organization_id' => $this->request->query['organization_id']]
			]);
			$conditions['Event.id'] = $event_ids;
		} else if (isset($this->request->params['organization_id'])) {
			$organization = $this->Event->Organization->find('first', [
				'contain' => ['Edition'],
				'conditions' => ['Organization.id' => $this->request->params['organization_id']]
			]);
			$event_ids = $this->Event->Organizer->find('list', [
				'fields' => 'event_id',
				'conditions' => ['organization_id' => $this->request->params['organization_id']]
			]);
			$conditions['Event.id'] = $event_ids;
			$this->set(compact('organization'));
		}
		// Time
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
		// iCal Feed
		if (isset($this->request->params['feed'])) {
			$this->Paginator->settings['limit'] = 200;
		}
		// Page
		if (isset($this->request->params['?']['page'])) {
			$this->request->query['page'] = $this->request->params['?']['page'];
		}
		$this->Paginator->settings['conditions'] = $conditions;
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
			'contain' => ['Edition', 'Venue', 'Organization'],
			'conditions' => ['Event.id' => $id]
		]);
		$this->set(compact('event'));
	}

	public function add() {
		if ($this->request->is('post')) {
			if (empty($this->request->data['Event']['venue_id']) && !empty($this->request->data['Venue']['name'])) {
				$this->request->data['Event']['venue_id'] = $this->Event->Venue->findOrCreate(
					$this->request->data,
					$this->request->data['Event']['edition_id']
				);
				unset($this->request->data['Venue']);
			}
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'message_success');
				return $this->redirect(['action' => 'view', 'id' => $this->Event->id]);
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$this->request->data = $this->request->query;
		}
		$editions = $this->Event->Edition->find('list');
		$venues = $this->Event->Venue->find('list');
		$organizations = $this->Event->Organization->find('list');
		$this->set(compact('editions', 'venues', 'organizations'));
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
		$venues = $this->Event->Venue->find('list');
		$organizations = $this->Event->Organization->find('list');
		$this->set(compact('editions', 'venues', 'organizations'));
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

			if (1 === count($events)) {
				$this->redirect([
					'controller' => 'events',
					'action' => 'add',
					'?' => reset($events)
				]);
			}

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

	public function import() {
		if ($this->request->is('post')) {
			if (empty($this->request->data['Event']['url'])) {
				$this->Session->setFlash(__('Please provide a url.'), 'message_error');
				return $this->redirect(['action' => 'import']);
			}
			$event = false;
			$providers = ['Eventbrite', 'Facebook', 'Meetup'];
			foreach ($providers as $provider) {
				if (stripos($this->request->data['Event']['url'], '.' . $provider . '.')) {
					$this->loadModel($provider);
					$event = $this->{$provider}->importFromUrl(
						$this->request->data['Event']['url'],
						$this->request->data['Event']['edition_id']
					);
				}
			}
			if ($event) {
				$this->redirect(['action' => 'add', '?' => $event]);
			} else {
				$this->Session->setFlash(__('Sorry, no event could be found. Please, try again.'), 'message_error');
			}
		}
		$editions = $this->Event->Edition->find('list');
		$this->set(compact('editions'));
	}

}
