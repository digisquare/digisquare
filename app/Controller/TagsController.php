<?php
App::uses('AppController', 'Controller');

class TagsController extends AppController {

	public function index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
		$this->set('tag', $this->Tag->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Tag->create();
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'), 'message_error');
			}
		}
		$events = $this->Tag->Event->find('list');
		$startups = $this->Tag->Startup->find('list');
		$this->set(compact('events', 'startups'));
	}

	public function edit($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved.'), 'message_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
			$this->request->data = $this->Tag->find('first', $options);
		}
		$events = $this->Tag->Event->find('list');
		$startups = $this->Tag->Startup->find('list');
		$this->set(compact('events', 'startups'));
	}

	public function delete($id = null) {
		$this->Tag->id = $id;
		if (!$this->Tag->exists()) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tag->delete()) {
			$this->Session->setFlash(__('The tag has been deleted.'), 'message_success');
		} else {
			$this->Session->setFlash(__('The tag could not be deleted. Please, try again.'), 'message_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function top() {
		$tags = $this->Tag->find('all', array(
			'fields' => array(
				'count(EventsTag.tag_id) AS count',
				'Tag.id',
				'Tag.name',
				'Tag.created',
				'Tag.modified'),
			'conditions' => 'Event.end_at > NOW()',
			'joins' => array(
				array(
					'table' => 'events_tags',
					'alias' => 'EventsTag',
					'conditions' => 'EventsTag.tag_id = Tag.id'),
				array(
					'table' => 'events',
					'alias' => 'Event',
					'conditions' => 'EventsTag.event_id = Event.id')
				),
			'limit' => 10,
			'group' => 'Tag.id',
			'order' => 'count DESC')
		);
		$this->set('tags', $tags);
	}


	public function startups($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$startups = $this->Startup->find('all', array(
			'fields' => array(
				'Startup.id',
				'Startup.name',
				),
			//'conditions' => 'Startup.id = startups_tags.startups_id',
			'joins' => array(
				array(
					'table' => 'startups_tags',
					'alias' => 'StartupTag',
					'conditions' => 'Startup.id = StartupTag.startups_id'),
				array(
					'table' => 'tags',
					'alias' => 'Tag',
					'conditions' => 'StartupTag.tags_id = Tag.id'),
				),
			)
		);
		$this->set('tags', $tags);
	}


}
