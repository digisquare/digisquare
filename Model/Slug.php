<?php
App::uses('AppModel', 'Model');

class Slug extends AppModel {

	public $belongsTo = array(
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'dependent' => true,
		),
	);

	public function createFromPlace($place) {
		// TODO: make slugs unique
		$this->create();
		$slug = $this->slugifyPlace($place);
		$this->set('place_id', $place['Place']['id']);
		$this->set('name', $slug);
		$this->save();
		return $this->id;
	}

	public function slugifyPlace($place) {
		$slug = $this->Place->implode($place);
		$slug = preg_replace('`[0-9]*`', '', $slug);
		return strtolower(Inflector::slug($slug, '-'));
	}
}
