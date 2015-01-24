<?php
App::uses('AppModel', 'Model');

class Slug extends AppModel {

	public $belongsTo = array(
		'Venue' => array(
			'className' => 'Venue',
			'foreignKey' => 'venue_id',
			'dependent' => true,
		),
	);

	public function createFromVenue($venue) {
		$slug_name = $this->slugifyVenue($venue);
		$slug = $this->find('first', [
			'contain' => false,
			'conditions' => [
				'Slug.name' => $slug_name
			]
		]);
		if ($slug) {
			return $slug['Slug']['id'];
		}
		$this->create();
		$this->set('venue_id', $venue['Venue']['id']);
		$this->set('name', $slug_name);
		$this->save();
		return $this->id;
	}

	public function slugifyVenue($venue) {
		$slug_name = $this->Venue->implode($venue);
		$slug_name = preg_replace('`[0-9]*`', '', $slug_name);
		return strtolower(Inflector::slug($slug_name, '-'));
	}
}
