<?php

$this->set('channel', array(
	'title' => 'Last Places !',
	'link' => $this->Html->url('/', true),
	'description' => 'Vous trouverez ici les dernières Places enregistrées'
	));

foreach ($places as $place) {

	echo $this->Rss->item(array(), array(
		'title' => $place['Place']['name'],
		'link' =>  '/places/' . $place['Place']['id'],
		'description' => $place['Place']['address'] . '<br>' . $place['Place']['city'],
		'pubDate' => $place['Place']['created']
		));
}
