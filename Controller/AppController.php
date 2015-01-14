<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = [
		'Session',
		'Auth',
		'Paginator' => ['paramType' => 'querystring'],
		'RequestHandler',
	];

	public $helpers = [
		'Session',
		'Html' => ['className' => 'BoostCake.BoostCakeHtml'],
		'Form' => ['className' => 'BoostCake.BoostCakeForm'],
		'Paginator' => ['className' => 'BoostCake.BoostCakePaginator'],
	];

	public function beforeFilter() {
		$this->Auth->allow('index', 'feed', 'view');
	}

	public function beforeRender() {
		$url = $this->here;
		if ('view' === $this->action) {
			switch ($this->name) {
				case 'Users':
					$url = Router::url([
						'action' => 'view',
						'id' => $this->viewVars['user']['User']['id'],
						'slug' => strtolower(Inflector::slug($this->viewVars['user']['User']['username'], '-'))
					]);
					break;

				case 'Events':
				case 'Places':
				case 'Organizations':
					$model = Inflector::singularize($this->name);
					$entity = strtolower($model);
					$url = Router::url([
						'slug' => $this->viewVars[$entity]['Edition']['slug'],
						'id' => $this->viewVars[$entity][$model]['id'],
						'bslug' => strtolower(Inflector::slug($this->viewVars[$entity][$model]['name'], '-'))
					]);
					break;
			}
		}
		if($url !== $this->here) {
			$this->redirect($url, 301);
		}
	}

}
