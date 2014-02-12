<?php

$this->set('channel', array(
	'title' => 'Last Places !',
	'link' => $this->Html->url('/', true),
	'description' => 'Vous trouverez ici les dernières Places enregistrées'
	));

foreach ($places as $place) {
	$permalink = $this->Html->url(array('controller' => 'places', 'action' => 'view', $place['Place']['id']), true);
	echo $this->Rss->item(array(), array(
		'title' => $place['Place']['name'],
		'link' => 'http://digisquare.loc/digisquare/places/' . $place['Place']['id'],
		'guid' => array('url' => $permalink, 'isPermaLink' => 'true'),
		'description' => $place['Place']['address'] . '<br>' . $place['Place']['city'],
		'pubDate' => $place['Place']['created']
		));
}
