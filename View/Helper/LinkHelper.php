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

	public function listOrganizations($title, $edition = [], $options = [], $confirmMessage = false) {
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

	public function viewPlace($title, $place = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$place = $title;
			$title = $place['Place']['name'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'places',
				'action' => 'view',
				'slug' => $place['Edition']['slug'],
				'id' => $place['Place']['id'],
				'bslug' => strtolower(Inflector::slug($place['Place']['name'], '-'))
			], $url),
			$options,
			$confirmMessage
		);
	}

	public function viewEvent($title, $event = [], $options = [], $confirmMessage = false) {
		if (is_array($title)) {
			$event = $title;
			$title = $event['Event']['name'];
		}
		$url = [];
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}
		return $this->link($title,
			array_merge([
				'controller' => 'events',
				'action' => 'view',
				'slug' => $event['Edition']['slug'],
				'id' => $event['Event']['id'],
				'bslug' => strtolower(Inflector::slug($event['Event']['name'], '-'))
			], $url),
			$options,
			$confirmMessage
		);
	}
}
