<?php
App::uses('AppController', 'Controller');

class StartupsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(['index']);
	}

	public function index() {
		$conditions = ['Startup.type' => 1];
		$this->Paginator->settings['contain'] = ['Edition', 'Venue'];
		$this->Paginator->settings['order'] = ['Startup.name' => 'ASC'];
		// Editions
		if (isset($this->request->query['edition_id'])) {
			$conditions['Startup.edition_id'] = $this->request->query['edition_id'];
		} else if (isset($this->request->params['slug'])) {
			$edition = $this->Startup->Edition->findBySlug($this->request->params['slug']);
			$conditions['Startup.edition_id'] = $edition['Edition']['id'];
			$this->set(compact('edition'));
		}
		// Page
		if (isset($this->request->params['?']['page'])) {
			$this->request->query['page'] = $this->request->params['?']['page'];
		}
		$this->Paginator->settings['conditions'] = $conditions;
		$startups = $this->Paginator->paginate('Startup');
		$this->set([
			'startups' => $startups,
			'_serialize' => ['startups']
		]);
		return $startups;
	}

}
