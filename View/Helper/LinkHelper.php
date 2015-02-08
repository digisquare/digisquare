<?php
App::uses('HtmlHelper', 'View/Helper');

class LinkHelper extends HtmlHelper {

	public function viewEdition($title, $edition = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$edition = $title;
			$title = $edition['Edition']['name'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'editions',
				'action' => 'view',
				'slug' => $edition['Edition']['slug']
			], $url),
			$options,
			$confirmMessage
		);
	}

	public function listEditionOrganizations($title, $edition = [], $options = [], $confirmMessage = false) {
		return $this->link($title,
			[
				'controller' => 'organizations',
				'action' => 'index',
				'slug' => $edition['Edition']['slug']
			],
			$options,
			$confirmMessage
		);
	}

	public function viewOrganization($title, $organization = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$organization = $title;
			$title = $organization['Organization']['name'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'organizations',
				'action' => 'view',
				'slug' => $organization['Edition']['slug'],
				'id' => $organization['Organization']['id'],
				'bslug' => strtolower(Inflector::slug($organization['Organization']['name'], '-'))
			], $url),
			$options,
			$confirmMessage
		);
	}

	public function viewVenue($title, $venue = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$venue = $title;
			$title = $venue['Venue']['name'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'venues',
				'action' => 'view',
				'slug' => $venue['Edition']['slug'],
				'id' => $venue['Venue']['id'],
				'bslug' => strtolower(Inflector::slug($venue['Venue']['name'], '-'))
			], $url),
			$options,
			$confirmMessage
		);
	}

	public function listEditionEvents($title, $edition = [], $options = [], $confirmMessage = false) {
		return $this->link($title,
			[
				'controller' => 'events',
				'action' => 'index',
				'slug' => $edition['Edition']['slug']
			],
			$options,
			$confirmMessage
		);
	}

	public function viewEvent($title, $event = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$event = $title;
			$title = $event['Event']['name'];
		}
		return $this->link($title,
			$this->eventUrl($event, $options),
			$options,
			$confirmMessage
		);
	}

	public function eventUrl($event, $options = []) {
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->url(
			array_merge([
				'controller' => 'events',
				'action' => 'view',
				'slug' => $event['Edition']['slug'],
				'id' => $event['Event']['id'],
				'bslug' => strtolower(Inflector::slug($event['Event']['name'], '-'))
			], $url),
			$options
		);
	}

	public function viewUser($title, $user = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$user = $title;
			$title = $user['User']['username'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'users',
				'action' => 'view',
				'id' => $user['User']['id'],
				'slug' => strtolower(Inflector::slug($user['User']['username'], '-'))
			], $url),
			$options,
			$confirmMessage
		);
	}

	public function viewTag($title, $tag = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$edition = $title;
			$title = $tag['Tag']['name'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'tags',
				'action' => 'view',
				'slug' => $tag['Tag']['slug']
			], $url),
			$options,
			$confirmMessage
		);
	}

}
