<?php
App::uses('AppController', 'Controller');

class SettingsController extends AppController {

	public function isAuthorized($user = null) {
		if ('edit' === $this->action) {
			if ($this->params['id'] === $this->Auth->user('id')) {
				return true;
			}
		}
		parent::isAuthorized($user);
	}

	public function edit($id = null) {
		if (!$id) {
			$id = $this->Auth->user('id');
		}
		if (!$this->Setting->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(['post', 'put'])) {
			foreach ($this->request->data['Setting'] as $key => $value) {
				$setting = $this->Setting->find('first', [
					'contain' => false,
					'conditions' => [
						'Setting.user_id' => $id,
						'Setting.key' => $key
					]
				]);
				if ($setting) {
					$this->Setting->id = $setting['Setting']['id'];
				} else {
					$this->Setting->create();
				}
				$this->Setting->save([
					'user_id' => $id,
					'key' => $key,
					'value' => $value
				]);
			}
			if ($this->Setting->User->save($this->request->data)) {
				$this->Session->setFlash(__('The settings have been saved.'), 'message_success');
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The settings could not be saved. Please, try again.'), 'message_error');
			}
		} else {
			$this->request->data = $this->Setting->User->find('first', [
				'contain' => ['Setting'],
				'conditions' => ['User.id' => $id]
			]);
			foreach ($this->request->data['Setting'] as $key => $setting) {
				$this->request->data['Setting'][$setting['key']] = $setting['value'];
				unset($this->request->data['Setting'][$key]);
			}
		}
	}

}
