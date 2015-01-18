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
		// TODO: make slugs unique
		$this->create();
		$slug = $this->slugifyVenue($venue);
		$this->set('venue_id', $venue['Venue']['id']);
		$this->set('name', $slug);
		$this->save();
		return $this->id;
	}

	public function slugifyVenue($venue) {
		$slug = $this->Venue->implode($venue);
		$slug = preg_replace('`[0-9]*`', '', $slug);
		return strtolower(Inflector::slug($slug, '-'));
	}
}
