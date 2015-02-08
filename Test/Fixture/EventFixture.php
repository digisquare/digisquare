<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'uid' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'edition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'venue_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'start_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_at' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => true),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'uid', 'edition_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_events_editions1_idx' => array('column' => 'edition_id', 'unique' => 0),
			'fk_events_venues1_idx' => array('column' => 'venue_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'uid' => '1nov02pmje5lf6sinh9g5ri6n4@google.com',
			'edition_id' => '9',
			'venue_id' => '2',
			'name' => 'Conférence Les sociétés Tech et la Bourse',
			'description' => 'Les sociétés Tech et la Bourse : pourquoi investir et comment les accompagner ?

Dans la continuité de la première EnterNext Tech Conference à Paris en novembre 2014, Bordeaux accueille la première conférence Tech en région le mardi 27 janvier 2014. Entrepreneurs, dirigeants et experts apporteront leurs témoignages et leurs conseils sur le financement des sociétés du secteur Tech.',
			'start_at' => '2015-01-27 15:15:00',
			'end_at' => '2015-01-27 18:45:00',
			'status' => '0',
			'url' => 'https://www.euronext.com/fr/tech?sid=1158',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-25 00:01:14'
		),
		array(
			'id' => '2',
			'uid' => 'b2pc16h2uj95t3c3t8errihk40@google.com',
			'edition_id' => '9',
			'venue_id' => '1',
			'name' => 'Coding Goûter',
			'description' => '',
			'start_at' => '2015-03-07 14:00:00',
			'end_at' => '2015-03-07 17:00:00',
			'status' => '0',
			'url' => '',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 23:48:55'
		),
		array(
			'id' => '3',
			'uid' => '54g8msrvo0e0n8kphf8v7msnus@google.com',
			'edition_id' => '9',
			'venue_id' => '1',
			'name' => 'Oui Share Drink',
			'description' => '- Présentation d’un évènement “Ouishare cycle” organisé par la team Ouishare fin janvier- Présentation d’un évènement co-organisé par la team Ouishare et par les start-ups de la cité numérique en Mars à Bordeaux.- Présentation de projets (merci de contacter directement Paulie par mail sur trequesserpauline@gmail.com ou via FB pour vos présentations)Nous réservons un temps durant le OS drink pour que vous puissiez présenter vos projets à la communauté


Price: Gratuit

Link: http://bxno.de/2014/13-janv-ouishare-drink/
',
			'start_at' => '2015-01-13 18:30:00',
			'end_at' => '2015-01-13 20:30:00',
			'status' => '0',
			'url' => '',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 18:07:09'
		),
		array(
			'id' => '4',
			'uid' => '24k5biiumoauhbou4lua5d33fg@google.com',
			'edition_id' => '9',
			'venue_id' => '3',
			'name' => 'Coding Dojo chez Coolworking',
			'description' => 'Les Coding Dojos sont des sessions amusantes et intenses pendant lesquelles des développeurs améliorent leurs compétences en programmation.
Organisateur Jean-Baptiste Dusseaut',
			'start_at' => '2015-01-12 18:30:00',
			'end_at' => '2015-01-12 20:30:00',
			'status' => '0',
			'url' => 'http://www.coolworking.fr/ ',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-25 00:48:57'
		),
		array(
			'id' => '5',
			'uid' => '8n4larm69qv8841ujso4ahcdfo@google.com',
			'edition_id' => '9',
			'venue_id' => '1',
			'name' => 'Coding Goûter',
			'description' => 'Le coding goûter a pour vocation de faire découvrir aux enfants l’art de la programmation. Chaque enfant est accompagné d’un parent pour passer l’après-midi à créer son propre jeu ou sa bd animée en ligne entre deux viennoiseries et un verre de jus d’orange.

Chaque enfant entre 8 et 14 ans devra amener avec lui ou elle les choses suivantes :
-    un ordinateur portable,
-    un parent (ou accompagnateur majeur),
-    à manger et/ou à boire à partager,
-    de la curiosité et une bonne dose de patience

Vous pouvez vous inscrire sur le formulaire en ligne.

Les places sont limitées au nombre de 20 binômes. Nous vous confirmerons votre présence par mail quelques jours avant l’événement.',
			'start_at' => '2015-01-31 14:00:00',
			'end_at' => '2015-01-31 17:00:00',
			'status' => '0',
			'url' => 'http://bxno.de/2015/31-janv-coding-gouter/',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 23:25:20'
		),
		array(
			'id' => '6',
			'uid' => 'luqcc68khstdqo35j1bivisdks@google.com',
			'edition_id' => '9',
			'venue_id' => '1',
			'name' => 'TTFX : Code et Robotique',
			'description' => 'Arduino, Raspberry Pi, Lego, les solutions pour concevoir, assembler, et programmer des systèmes robotisés n’ont jamais été aussi accéssibles. Que ce soit pour du prototypage, une performance artistique, ou de la domotique, profitez de cette soirée pour faire le tour de la question.

Déroulement 
19h à 19h15 : Présentation de l’événement et Lightning Talk
19h15 à 20h : Arduino, la pervasivité du code dans le quotidien
- Historique d\'Arduino : quand, qui, comment, pourquoi? par Sophie Itey
- Arduino : Hardware et software par Joseph Larralde
- Arduino et robotique par Olivier Itey
20h00 à 20h45 : Machine learning embarqué par Alexande Valette
20h45 à 21h30 : Buffet',
			'start_at' => '2015-01-29 19:00:00',
			'end_at' => '2015-01-29 22:00:00',
			'status' => '0',
			'url' => 'http://ttfx13.eventbrite.com',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 23:23:00'
		),
		array(
			'id' => '7',
			'uid' => 'si5rivpk8sht999u8i7j6kvv58@google.com',
			'edition_id' => '9',
			'venue_id' => '3',
			'name' => 'Soirée Lean Startup',
			'description' => 'Programme de la soirée : 
- Retour d\'expérience de Fabien Barbaud sur la création de la startup Public-Idées en 2005, devenue aujourd\'hui une entreprise présente à l’échelle internationale, comprenant près d\'une centaine d\'employés. 
- Atelier Lean Takeoff : Serious Game permettant de découvrir les principes du Lean Startup
-  Apéritif et  discussions (Merci d\'amener un petit truc à boire et à grignoter) ',
			'start_at' => '2015-02-02 19:00:00',
			'end_at' => '2015-02-02 22:00:00',
			'status' => '0',
			'url' => 'http://www.meetup.com/Lean-Startup-Bordeaux/events/219637254/',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 23:30:34'
		),
		array(
			'id' => '8',
			'uid' => 'rnrm57d91ppnrpgmvqbnfs5jks@google.com',
			'edition_id' => '9',
			'venue_id' => '1',
			'name' => 'Développez une application mobile native avec des technologies web : le framework Titanium ',
			'description' => 'Nous sommes Emilie Caïe, Mr X, Mme Y et Mr U et nous développons depuis quelques années des applications basées sur l\'utilisation du framework Titanium dans nos activités respectives. Nous aimerions vous proposer un retour d\'expérience et partager avec vous nos bonnes pratiques dans l\'utilisation de ce framework. 

Nous répondrons alors à plusieurs questions quant à l\'utilisation de Titanium en entreprise : pourquoi Titanium plutôt que SenchaTouch, Phonegap ou autre ? Est-ce l\'outil adapté à mon besoin ? Ai-je les ressources pour développer mon application avec cette solution ? Jusqu\'où puis-je aller grâce à Titanium ? Qu\'est-ce que je ne pourrais pas faire ? 

Suite à cette présentation, l\'équipe restera disponible pour échanger autour d\'un verre. N’oubliez pas d’apporter quelque chose à partager pour l’apéro collaboratif.

Url : https://docs.google.com/forms/d/1YUZUSe7Ls6c_FYCMGYHci2i4wcjwzj5qARYY0TpGY_s/viewform',
			'start_at' => '2015-01-22 19:00:00',
			'end_at' => '2015-01-22 21:30:00',
			'status' => '0',
			'url' => '',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 18:07:09'
		),
		array(
			'id' => '9',
			'uid' => 'eq8rc9qfj4p72clqepm01dpl1g@google.com',
			'edition_id' => '9',
			'venue_id' => '4',
			'name' => 'Apéro Okiwi à l\'Oxford Arms',
			'description' => '',
			'start_at' => '2015-01-19 18:30:00',
			'end_at' => '2015-01-19 20:30:00',
			'status' => '0',
			'url' => '',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 23:54:31'
		),
		array(
			'id' => '10',
			'uid' => '5jpfnv9ec3le4qg557l3v8g5b4@google.com',
			'edition_id' => '9',
			'venue_id' => '1',
			'name' => 'Café Philonumérique # 5 ',
			'description' => 'Café Philonumérique # 5 avec Thomas Gibertie
Thème : « Barbelés numériques – Image, Espace, Pouvoir »
Organisé et animé par : François Moraud

Les cafés philonumériques reviennent en 2015 avec cette cinquième édition au Node ! 

Le thème : « Barbelés numériques – Image, Espace, Pouvoir » 

Le pitch : Les espaces physiques et leurs représentations ont toujours été délimités en « dispositifs de pouvoirs », capacité de contrôler et déterminer les conduites, les discours et les opinions. Une technologie comme le barbelé a joué un rôle majeur dans ces dispositifs modernes. A l’inverse, Internet est présenté comme un espace libre, ouvert, non délimitable, sans frontières. Mais si ce n’était pas le cas, qu’en serait-il de nos barbelés numériques ? Invité : Né prématurément pour 30 jours de couveuse à son arrivée ; attaqué par un singe jaloux à l’âge de 6 mois ; Thomas Gibertie passe le plus clair de son temps à mesurer l’urgence de la situation. Ainsi formé à l’EHESS en anthropologie historique, il poursuit ses observations en y associant la cybernétique et le paradigme numérique. Il s’attache à comparer l’incomparable, à tisser des liens entre les époques et les cultures, jetant des ponts dans le Théâtre des Informations. 

Proposé et animé par François Moraud.',
			'start_at' => '2015-01-19 19:00:00',
			'end_at' => '2015-01-19 22:30:00',
			'status' => '0',
			'url' => '',
			'created' => '2015-01-24 18:07:09',
			'modified' => '2015-01-24 23:53:55'
		),
	);

}
