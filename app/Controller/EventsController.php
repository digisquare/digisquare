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
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();			
			if ($this->Event->save($this->request->data)) {
				die(debug($this->request->data));
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
	public function participate($id = null){
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

	public function feed(){
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
					
			$extension = pathinfo($this->request->data['Event']['ical_file']['name'],PATHINFO_EXTENSION);
			$file = $this->request->data['Event']['ical_file'];
			if (!empty($this->request->data['Event']['ical_file']['tmp_name']) 
				&& in_array($extension, array('ics', 'csv'))) {
				//Ici function pour ouvrir et traiter notre fichier.
				$file = new File($this->request->data['Event']['ical_file']['tmp_name']);		
				$contents = $file->read();
				$calendar = Sabre\VObject\Reader::read($contents); // ne pas oublier sabre devant.
				//if(isset($calendar->TZID)){
				//	echo($calendar->TZID);
				//}
				//else{echo("raté");}				
				foreach($calendar->VEVENT as $vevent){
					//echo "Name as : ",(string)$vevent->SUMMARY, "<br>";
					$this->Event->create();
					//die(debug($vevent->DTSTART->getDateTime()->format('Y-m-d H:i:s')));
					$event = array(
						'Event' => array(
							'edition_id' => '1',
							'place_id' => '1',
							'name' => $vevent->SUMMARY,
							'description' => 'vide',
							'start_at' => $vevent->DTSTART->getDateTime()->format('Y-m-d H:i:s'),
							'end_at' => $vevent->DTEND->getDateTime()->format('Y-m-d H:i:s'),
							'status' => '1',
							'url' => ' '
						),
						'Tag' => array(
							'Tag' => ''
						)
					);				
					if ($this->Event->save($event)) {
						//$this->Session->setFlash(__('The event has been saved.'), 'message_success');
						//return $this->redirect(array('action' => 'index'));
					}
					else{
					$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'message_error');
					return $this->redirect(array('action' => 'index'));
					}
				}
					$this->Session->setFlash(__('The event has been saved.'), 'message_success');
					return $this->redirect(array('action' => 'index'));			
			}		
		}
	}
}
