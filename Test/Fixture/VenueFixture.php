<?php
/**
 * VenueFixture
 *
 */
class VenueFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'zipcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'country_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'latitude' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '8,6', 'unsigned' => false),
		'longitude' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '9,6', 'unsigned' => false),
		'event_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'id' => 1,
			'name' => 'Le Node',
			'address' => '12 Rue Des Faussets',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR',
			'latitude' => 44.840373,
			'longitude' => -0.570311,
			'event_count' => 0,
			'created' => '2014-12-25 22:47:50',
			'modified' => '2014-12-25 22:47:50'
		],
	];

	public $venues = [
		'Le Node, 12 rue des Faussets, 33000 Bordeaux' => [
			'name' => 'Le Node',
			'address' => '12 Rue Des Faussets',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Le Node, Rue des Faussets, Bordeaux, France' => [
			'name' => 'Le Node',
			'address' => 'Rue Des Faussets',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Le Node, 12 rue des Faussets, 33000 Bordeaux, France' => [
			'name' => 'Le Node',
			'address' => '12 Rue Des Faussets',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'The Ramblin\' Man - 52 Quai Richelieu - 33000 Bordeaux - France' => [
			'name' => 'The Ramblin\' Man',
			'address' => '52 Quai Richelieu',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'rue Causserouge' => [
			'name' => 'Rue Causserouge',
			'address' => '',
			'zipcode' => '',
			'city' => '',
			'country_code' => 'FR'
		],
		'Auberge Numérique, AEC, 145 rue Achard, 33300 Bordeaux' => [
			'name' => 'Auberge Numérique',
			'address' => '145 Rue Achard',
			'zipcode' => '33300',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Le Node - 12 rue des Faussets 33000 Bordeaux' => [
			'name' => 'Le Node',
			'address' => '12 Rue Des Faussets',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Salle de la Cheminée à l’Utopia' => [
			'name' => 'Salle De La Cheminée à L’Utopia',
			'address' => '',
			'zipcode' => '',
			'city' => '',
			'country_code' => 'FR'
		],
		'Golden Apple, 46 Rue Borie, 33300 Bordeaux' => [
			'name' => 'Golden Apple',
			'address' => '46 Rue Borie',
			'zipcode' => '33300',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Coolworking, 19 rue Esprit des Lois, 33000 Bordeaux' => [
			'name' => 'Coolworking',
			'address' => '19 Rue Esprit Des Lois',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Le Node - 12 rue des Faussets Bordeaux 33000' => [
			'name' => 'Le Node',
			'address' => '12 Rue Des Faussets',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Centre d\'animation Saint-Pierre, 4 Rue du Mulet, Bordeaux, France' => [
			'name' => 'Centre d\'Animation Saint-Pierre',
			'address' => '4 Rue Du Mulet',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Le Node Bordeaux' => [
			'name' => 'Le Node',
			'address' => '',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Centre d\'animation Saint-Pierre (4 Rue du Mulet, Bordeaux, France)' => [
			'name' => 'Centre d\'Animation Saint-Pierre',
			'address' => '4 Rue Du Mulet',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Auberge Numérique, 137 rue Achard, Bordeaux' => [
			'name' => 'Auberge Numérique',
			'address' => '137 Rue Achard',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Grand Bar Castan' => [
			'name' => 'Grand Bar Castan',
			'address' => '',
			'zipcode' => '',
			'city' => '',
			'country_code' => 'FR'
		],
		'The Ramblin\' Man, 52 Quai Richelieu, 33000 Bordeaux' => [
			'name' => 'The Ramblin\' Man',
			'address' => '52 Quai Richelieu',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Coolworking, 19 Rue Esprit des Lois, 33000 Bordeaux, France' => [
			'name' => 'Coolworking',
			'address' => '19 Rue Esprit Des Lois',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Le Node, 12 rue des Faussets, Bordeaux, France' => [
			'name' => 'Le Node',
			'address' => '12 Rue Des Faussets',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Bordeaux' => [
			'name' => 'Bordeaux',
			'address' => '',
			'zipcode' => '',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Café Rouge, 46 rue St Rémi, 33000 Bordeaux' => [
			'name' => 'Café Rouge',
			'address' => '46 Rue St Rémi',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'ENSEIRB-MATMECA - 1 avenue du Docteur Albert Schweitzer - 33402 Talence - France' => [
			'name' => 'ENSEIRB-MATMECA',
			'address' => '1 Avenue Du Docteur Albert Schweitzer',
			'zipcode' => '33402',
			'city' => 'Talence',
			'country_code' => 'FR'
		],
		'Mairie de Bordeaux, Place Pey Berland, 33000 Bordeaux' => [
			'name' => 'Mairie De Bordeaux',
			'address' => 'Place Pey Berland',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'19 rue Esprit des lois 33000 Bordeaux' => [
			'name' => '19 Rue Esprit Des Lois, Bordeaux',
			'address' => '19 Rue Esprit Des Lois',
			'zipcode' => '33000',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		'Campus Ionis, 85 Rue du Jardin public, 33300 Bordeaux' => [
			'name' => 'Campus Ionis',
			'address' => '85 Rue Du Jardin Public',
			'zipcode' => '33300',
			'city' => 'Bordeaux',
			'country_code' => 'FR'
		],
		// 'The Golden Apple, 46 Rue Borie, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons, 15 rue Rode, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Grand Bar Castan, 2 Quai de la Douane, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Union Saint Jean, 97 rue Malbec' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 Rue des Faussets, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons (15 Rue Rode, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CoolWorking, 19 rue esprit des Lois, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'H14 - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Makila Kafé' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Ship and anchor, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Mairie de Caudéran, 130 Avenue Louis Barthou, 33200 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons, 15 Rue Rode, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Pépinière éco-créative des Chartrons, 9 rue André Darbon, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Salons de l'Hôtel de Ville, Place Pey Berland' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB, 1 Avenue du Docteur Albert Schweitzer, 33400 Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB, 1 Avenue du Docteur Albert Schweitzer, Talence, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'AlliaForm, Cité mondiale, 14 parvis des Chartrons / 20 quai des Chartrons, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Fabrique Pola, Tram C - Terres neuves, Cité Numérique, 2 rue M Sangnier, Bègles' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'AEC, 145 rue Achard, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Golden Apple, rue de la Pomme d'Or, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Effervea, 41 rue d'Aviau, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Café Rouge, 46 Rue Saint-Rémi, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '12 Rue des Faussets, 33000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Skate Park des Chartrons, Place Bergonié et la Caserne de Niel' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Epitech Bordeaux, 85 rue du Jardin Public, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Node' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Golden Apple (46 Rue Borie, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hôtel de Région - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Parvis de la maison internationale, Bergonié' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CAPC, Rue Ferrere' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Café Brun, 45 rue Saint Rémy' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Bordeaux, 54 rue St Sernin, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Escale du livre, Quartier St Croix, Comptoir des mots, square Dom Bedos' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hôtel Mercure Bordeaux Château Chartrons, 81 cours Saint Louis Bordeaux, 33300' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Départ de la Place Gambetta' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plateau TV IJBA - IUT Bordeaux 3, 1 Rue Jacques Ellul' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison de quartier Chantecler, 2 impasse Sainte Elisabeth' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Espace Saint Rémy, rue Jouannet' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'rue Causserouge  ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre d'animation Saint Michel, 25 rue Permentade' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Inseec, Hangar 16' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Façade du H14 (côté Skate Park) & Place du Palais' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Espace St Rémi, Rue Jouannet' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Iseg, 85 rue du Jardin Public' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison de quartier du Tauzin' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'I.BOAT' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre d'animation Bastide Benauge - Salle Arabesque, 23 rue Raymond Poincaré' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'tbd' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hub Rocket, 54 rue Saint Sernin, 33000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Quartier Saint-Pierre' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '145 rue Achard, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Bordeaux / Lac Bâtiment C 10 rue René Cassin 33409 Bordeaux Cedex' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'INRIA - Université de Bordeaux 1 - 351 cours de la libération - 33405 Talence Cedex ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cap Sciences' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'La Victoire' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Grand Bar Castan ? Makila Café ?' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '85 Rue du Jardin public - 33000 Bordeaux - France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique AEC, 137 rue Achard, 33300 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique - 145 rue Achard - 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Café Rouge, 46 rue Saint Rémi, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Iut Michel de Montaigne-Bordeaux 3' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'http://goo.gl/maps/y3Kw ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'l’Autre Petit Bois, 20 Rue Lanterne, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'EPITECH, 85 rue du Jardin Public, 33000 BORDEAUX' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Iut Michel de Montaigne-Bordeaux 3, 1, rue Jaques Ellul, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Café Auguste, 3 venue de la Victoire, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Grand Bar Castan, 2 Quai de la Douane, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB MATMECA, Amphi A' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge numérique d'AEC, 145 rue Achard - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Pépinière d'Entreprises Eco-Créative - 9, rue André Darbon - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Couleur Café' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Epitech Bordeaux, 85 Rue du Jardin public, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CAPC musée d'art contemporain de Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Conférence organisée par le magazine Cubeek à l'Université Victor Segalen Bordeaux 2 venue de la Victoire' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'IngéSup, 89 Quais des Chartrons, 333000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Conseil régional d’Aquitaine, 14 rue François de Sourdis, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Molly Malone's' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Palais des congrès de Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Athénée Municipal de Bordeaux, Place St Christoly' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Restaurant La Villa Sud-Ouest, 2 et 4 avenue Roger Chaumet, 33600 Pessac' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons, 15 Rue Rode, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison Polyvalente Jean Giono, 13 Allée Jean Giono' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cité mondiale - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Place de la Victoire - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Molly Malone's, 83 Quai Chartrons, Bordeaux (Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '?' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Bistrot Des Anges, 19 rue Rodé, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cambridge Arms, 27 Rue Rode, 33000 ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Bar Castan, 2 Quai de la Douane, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Institut Cervantès de Bordeaux, 57 Cours de l'Intendance, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'IUT Bordeaux Montesquieu, Université Bordeaux 4, 35, avenue Abadie' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Bar à vins de la Cité Mondiale, 18 parvis des Chartrons, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Molly Malone's, 83 Quai Chartrons, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Spira' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Pearl' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cassolette‎, 20 Place de la Victoire, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison Eco citoyenne' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hangar 18, Quai de Bacalan, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ESCEN (101 quai des Chartrons, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Delicacy, 21 rue du port, 33800 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hub Rocket, 54 rue Saint-Sernin, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'AEC, Auberge Numérique, 145 rue Achard, 33300' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Makila Kafé, Hangar 17 - Quai de Bacalan, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'AEC, 145 rue Achard, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'AEC, 145 rue Achard, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Espace François Mauriac de Talence (Gironde)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'I.S.E.G., 1er étage salle 1.6, 85 rue du Jardin Public, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Utopia, à Bordeaux, venue Camille Julian (demandez la Salle de la Cheminée) ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique AEC, 145 rue Achard, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Plateau, à Eysines (Gironde)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Amphi 700, Université Bordeaux 3' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hub Rocket (54 rue St Sernin, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Espace Agora du Haut-Carré sur le domaine universitaire de Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cassolette Café, venue de la Victoire, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'AEC, 145 rue Achard, Bordeaux ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique - AEC - 137 rue achard - 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Rue Jacques Ellul, plateau TV de l’IUT Michel de Montaigne, à Bordeaux.' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cinéma Jean Eustache' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Ingesup Bordeaux, 88 Quai des Chartrons, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'locaux de l'association, 14 rue de la Réole' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ESCEN, 101 quai des Chartrons, Bordeaux, 33000' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'La C.U.V., 7 venue Maucaillou ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison Eco citoyenne, quai de Richelieu' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'TnBA, Square Jean Vauthier, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Rocher de Palmer, Avenue Vincent Auriol, 33150 Cenon' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Place Fernand Lafargue, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'A l'Agence WSB, 6 rue d'Enghien' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Wine More Time, Rue Saint James' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Union Saint Bruno, rue Brizard' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auditorium du CAPC, Rue Ferrere' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Nouvelle Salle des Commissions, Hôtel de Ville de Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Université Bordeaux Segalen - La Victoire ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Wine more time' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Place de la Victoire' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Union US Chartrons, 9 venue Saint Martial' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre d'animation Saint-Michel, 25 rue Permentade, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Chez Fred, 19 Place du Palais, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'IUT SRC de Bordeaux , 1 rue Jacques Ellul' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CCI de Bordeaux, 17 venue de la Bourse, 33076 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'The Black Velvet, 9 Rue du Chai des Farines, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB MATMECA, Amphi A, 1 Avenue du Docteur Albert Schweitzer, 33400 Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons, 15 Rue Rode 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Wine more time, 8 rue Saint James, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CCI de Bordeaux, salle Garonne 2, 17 venue de la Bourse, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'PJJ de Bordeaux IV, 35 venue Pey Berland à Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique, 145 rue Achard, Bordeaux (Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre d'animation du Grand Parc' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Quai des Chartrons' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison du Jardinier, Rue de Rivière' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Salons de l’Hôtel de Ville, Place Pey Berland, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cap Sciences, Hangar 20, Quai de Bacalan, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'La Cantine, 111 rue Notre Dame, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'L'Oenolimit, 2 rue Ayres, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'BB Majeur, 10 Place du marché des Chartrons' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Domaine du Haut Carré, Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Salle des fêtes (La salle des fêtes, Ruffiac, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB MATMECA' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Tapa'l'oeil (à confirmer)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Grand Bar Castan, 2 Quai de la Douane' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Applicatour, 4 rue Ferrère, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Pépinière éco-créative des chartrons, 9 rue André Darbon, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ZAC, 89 Quai des Chartrons, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cité numérique - rue Marc Sangnier - Bègles' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node - 12 rue des Faussets, bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Coolworking, 19 Rue Esprit des Lois, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Ingésup, 88 Quai des Chartrons, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre d'animation Saint-Pierre,4 Rue du Mulet, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 rue des Faussets 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node - 12 rue des Faussets 33000 Bordeaux - France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Node - 12 rue des Faussets 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node - 12 rue des faussets 33000 Bordeaux ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique, AEC, 137 rue Achard, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Octopepper, 22 rue Vital Carles, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Château de Palmer, rue Aristide Briand, 33150 Cenon (à coté du Rocher Palmer)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Pin Galant - Mérignac' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Château de Palmer - Cenon (à coté du Rocher de Palmer)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Pépinière Eco-Créative des Chartrons, 9 Rue André Darbon, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Oxford Arms, 9 Place des Martyrs de la Résistance, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 rue des Fausset, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Conseil Régional d’Aquitaine - Hôtel de Région - 14 rue François de Sourdis - 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Rocher de Palmer / Cenon' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'DARWIN, l’Eco-Système de la caserne niel' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique, 137 Rue Achard, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Château Vray Canon Boyer, 33126 Saint Michel de Fronsac' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node 12, rue des Faussets 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Golden Apple, 46 Rue Borie, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'La Brasserie Bordelaise, 50 Rue Saint-Rémi, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Skatepark, quai des Chartrons, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique - AEC, 137 rue Achard, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre d'animation Saint-Pierre, 4 Rue du Mulet, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Lectra, 23 Chemin de Marticot, Cestas, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'BordeauxJUG' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cap Sciences - Hangar 20 - Quai de Bacalan à Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hall de l’ENSEIRB-MATMECA' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Base Sous Marine, Boulevard Alfred Daney 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Ingesup Bordeaux (89 Quai des Chartrons, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'A définir' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 Rue des Faussets, 33000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Athénée Municipal, Place Saint-Christoly, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12, rue des Faussets , 33000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Bar Castan 2 Quai de la Douane, 33000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Connemara, 14-18 Cours Albret, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Darwin Ecosystème, 87 quai des Queyries, 33100 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Epitech Bordeaux, Rue du Jardin public, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Chez Marcel et Lilly, 13 Rue du Quai Bourgeois, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Enseirb Matmeca, Talence, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CESI, 140, avenue du 11 Novembre, Blanquefort, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Coolworking, 19 Rue Esprit des Lois, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'INSEEC Bordeaux - Quai de Bacalan - H18 - Bordeaux - France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Athénée Municipal - Place Saint-Christoly, Bordeaux - 33000 Bordeaux - France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'The Frog & Rosbif, 23 rue Ausone, 3000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Oxford Arms 9 Place des Martyrs de la Résistance 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'SII (11, Avenue Neil Armstrong, Merignac, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB (1 Avenue du Docteur Albert Schweitzer, Talence, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CoolWorking (19 rue esprit des lois, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Yaal, 18 Rue Gratiolet, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'l'Agora du Haut Carré à Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CAPC, musée d'art contemporain de Bordeaux, Rue Ferrere, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'The Golden Apple, 46 Rue Borie, 33300 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Aérocampus Aquitaine, 1 Route de Cénac 33360 Latresne' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Oxford Arms, 9 Place des Martyrs de la Résistance, 33000 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Ingesup Bordeaux, 89 Quai des Chartrons, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '5 venue Jean Jaurès 33000 Bordeaux (DTIC)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Espace DARWIN, 87 Quai des Queyries, 33100 Bordeaux Bastide' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Epitech, 85 rue du Jardin Public, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Avenue Jacqueline Auriol - 33700 Mérignac - France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Campus IONIS, rue du Jardin Public - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hôtel de région - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Pépiniere éco créative des chartrons-9 Rue André Darbon, 33300 Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre Condorcet, 162 avenue du Dr Albert Schweitzer, 33600 Pessac' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hub Rocket, 54 rue St Sernin, 33000, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Les Chais de Millesima, 87 quai de Paludate, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Hôtel de Région, 14 rue François de Sourdis, 33077 Bordeaux ' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cap Sciences - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Coolworking' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons, rue Rode, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'L'Œnolimit, 2 rue des Ayres, 33000 bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Charles Dickens, 9 Quai de la Douane, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'TnBA (Théâtre national de Bordeaux en Aquitaine)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Parc des Expositions, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Epitech, 85 rue du Jardin Public, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'IUT SRC' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node,12 rue des faussets, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Amphi A de l'ENSEIRB MATMECA' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Aquinum' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Salle de réunion Node' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Pin Galant, 34 Avenue du Maréchal de Lattre de Tassigny, 33700 Merignac' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Rocher de Palmer, 1 Rue Aristide Briand, 33150 Cenon' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// ' 9, Quai de la Douane, 33000, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Maison éco-citoyenne de Bordeaux, Quai Richelieu, 333000 Bordeaux (Tram A ou C - Porte de Bourgogne)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'WSB Agency, 6 rue d'Enghien, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// ' - 21 rue des Retaillons - Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Node, 12 rue des Faussets, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Arts et Métiers Paristech, Centre de Bordeaux-Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CCI de Bordeaux, Place de la bourse' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Opéra National de Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Salle Son Tay (quartier Belcier), 47 rue Son Tay, 33800 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'IUT Michel de Montaigne // SRC, 1 Rue Jacques Ellul, Place Renaudel, 33080 BORDEAUX' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'café rouge' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre Condorcet, 162 avenue du Docteur Albert Schweitzer, 33600 Pessac' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Tapa'l'Oeil' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Athénée Municipale, Place Saint Christoly, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Café Rouge, 46 Rue Saint-Rémi, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Agora, Haut Carré, Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ENSEIRB / MATMECA – Salle T12 - 1 Avenue du Docteur Albert Schweitzer 33402 TALENCE' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// ' Hôtel de Région, 14 rue François de Sourdis 33 000 Bordeaux.' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Centre de congrès Cité mondiale, 18 Parvis des Chartrons, 33080 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 rue des faussets, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'La Cub, Hotel Communautaire Salle 1, Etage T1, Hôtel Communautaire, Esplanade Charles de Gaule, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cellenza (156 Boulevard Haussmann, Paris, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Connemara (14-18 Cours d'Albret, Bordeaux, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '19 rue Esprit des lois, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Motion Twin, 1 Place Lainé, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'ISEG, 85 Rue du Jardin public, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// '3 chemin de Marticot (Bordeaux-productic , Cestas, France)' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Sew&Laine, 85 cours de l'Argonne, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 rue des faussets, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CoolWorking, 19 rue esprit des lois, Bordeaux, France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Enseirb - Matmeca' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Cambridge Arms Pub' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Grand Bar Castan, 2 Quai de la Douane, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Oxford Arms, 9 Place Martyrs de la Résistance, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Arpinum, 42 rue de Cardoze, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Technopole Bordeaux Montesquieu, 1 allée Jean Rostand, 33651 MARTILLAC' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Plaza Chartrons, rue Rode, 33300 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'The Charles Dickens Pub, 9 Quai de la Douane, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Le Node, 12 rue des faussets, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'CoolWorking, 19 rue Esprit des Lois, 33000 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Auberge Numérique, 145 rue Achard, 33000 BORDEAUX' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'IUT SRC, 1 rue Jacques ELLUL, 33800 Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Darwin, Caserne Niel, Quais de Queries, Bordeaux' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Enseirb Matmeca, 1 Avenue du Docteur Albert Schweitzer, 33402 Talence' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'EPITECH - 85 Rue du Jardin public - 33000 Bordeaux - France' => [
		// 	'name' => 'Le Node',
		// 	'address' => '12 Rue Des Faussets',
		// 	'zipcode' => '33000',
		// 	'city' => 'Bordeaux',
		// 	'country_code' => 'FR'
		// ],
		// 'Epitech Bordeaux, 89 Rue du Jardin public, 33000 Bordeaux, France' => (int) 0
	];
}
