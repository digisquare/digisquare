<?php
$this->set('channel', array(
	'title' => __('Latest Places on Digisquare'),
	'link' => $this->Html->url(
		array(
			'controller' => 'places',
			'action' => 'index',
		),
		true
	),
	'description' => __('Latest Places on Digisqure'),
	'lang' => 'fr-fr'
));

foreach ($places as $place) {
	$link = $this->Html->url(
		array(
			'controller' => 'places',
			'action' => 'view',
			'id' => $place['Place']['id']
		),
		true
	);
	echo $this->Rss->item(
		array(),
		array(
			'title'=> $place['Place']['name'],
			'link' => $link,
			'description' => $place['Place']['address'] . '<br>' . $place['Place']['city'],
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'pubDate' => $place['Place']['created']
		)
	);	
}
