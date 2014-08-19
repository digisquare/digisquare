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

	public function slugifyName($name) {
		$name = ' ' . $name . ' ';
		$name = str_ireplace(
			array(
				',', '-', '.',
				1, 2, 3, 4, 5, 6, 7, 8, 9, 0,
				' le ', ' la ', ' les ', 'l\'', 'd\'', ' du ', ' de ', ' des ',
				' à ', ' au ', ' aux ',
				' rue ', ' avenue ', ' place ', ' st ', ' saint ',
				' france '
			),
			' ',
			$name
		);
		$editions = $this->Place->Event->Edition->find('list');
		$name = str_ireplace($editions, '', $name);
		$name = strtolower(Inflector::slug($name, '-'));
		return $name;
	}
}
