<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = [
		'Session',
		'Auth' => [
			'authorize' => [
				'all' => array('actionPath' => 'controllers/'),
				'Controller',
				'Actions',
			],
			'loginRedirect' => '/',
			'logoutRedirect' => '/',
			'unauthorizedRedirect' => false
		],
		'Acl',
		'Paginator' => ['paramType' => 'querystring'],
		'RequestHandler',
		'Security',
	];

	public $helpers = [
		'Session',
		'Html' => ['className' => 'BoostCake.BoostCakeHtml'],
		'Form' => ['className' => 'BoostCake.BoostCakeForm'],
		'Paginator' => ['className' => 'BoostCake.BoostCakePaginator'],
	];

	public function beforeFilter() {
		if ($this->Auth->user() && 1 == $this->Auth->user('group_id')) {
			$this->Auth->allow();			
		}
	}

	public function isAuthorized($user = null) {
		if (!isset($user['id']) || !isset($this->params['id'])) {
			return false;
		}
		if ('edit' === $this->action) {
			try {
				return $this->Acl->check(
					[
						'model' => 'User',
						'foreign_key' => $user['id']
					],
					[
						'model' => $this->modelClass,
						'foreign_key' => $this->params['id']
					],
					'update'
				);
			} catch (Exception $e) {
				return false;
			}
		}
		return false;
	}

	public function beforeRender() {
		$model = Inflector::singularize($this->name);
		$entity = strtolower($model);
		$this->redirectPrettyViewUrls($model, $entity);
		$this->setSessionEdition($entity);
	}

	public function redirectPrettyViewUrls($model, $entity) {
		$url = $this->here;
		
		if (isset($this->request->params['ext'])) {
			return true;
		}

		if ('/index.php' === $_SERVER['REQUEST_URI']) {
			$this->redirect('/', 301);
		}

		if ('view' === $this->action) {
			switch ($this->name) {
				case 'Users':
					$url = Router::url([
						'action' => 'view',
						'id' => $this->viewVars['user']['User']['id'],
						'slug' => strtolower(Inflector::slug($this->viewVars['user']['User']['username'], '-'))
					]);
					break;

				case 'Tags':
					$url = Router::url([
						'action' => 'view',
						'slug' => $this->viewVars['tag']['Tag']['slug']
					]);
					break;

				case 'Events':
				case 'Venues':
				case 'Organizations':
					$url = Router::url([
						'slug' => $this->viewVars[$entity]['Edition']['slug'],
						'id' => $this->viewVars[$entity][$model]['id'],
						'bslug' => strtolower(Inflector::slug($this->viewVars[$entity][$model]['name'], '-'))
					]);
					break;
			}
			$this->set('id', $this->viewVars[$entity][$model]['id']);
		}

		if ('index' === $this->action) {
			switch ($this->name) {
				case 'Events':
				case 'Venues':
				case 'Organizations':
					if (isset($this->viewVars['edition']['Edition']['slug'])) {
						$url = Router::url([
							'action' => 'index',
							'slug' => $this->viewVars['edition']['Edition']['slug']
						]);
					} else {
						$url = Router::url([
							'action' => 'index'
						]);
					}
					break;
			}
		}

		if ($url !== $this->here) {
			$this->redirect($url, 301);
		}
	}

	public function setSessionEdition($entity) {
		$edition = false;
		if (isset($this->viewVars['edition']['Edition'])) {
			$edition['Edition'] = $this->viewVars['edition']['Edition'];
		} elseif (isset($this->viewVars[$entity]['Edition'])) {
			$edition['Edition'] = $this->viewVars[$entity]['Edition'];
		} else {
			// die(debug($this->Session->check('Edition')));
			if (!$this->Session->check('Edition')) {
				// TODO: detect closest edition
				$edition['Edition'] = [
					'id' => 9,
					'name' => 'Bordeaux',
					'slug' => 'bordeaux'
				];
			}
		}
		if ($edition) {
			foreach ($edition['Edition'] as $key => $value) {
				$this->Session->write('Edition.' . $key, $value);
			}
		}
	}
}
