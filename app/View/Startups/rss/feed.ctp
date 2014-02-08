<?php
$this->set('channel', array(
	'title' => __('Latest Startups on Digisquare'),
	'link' => $this->Html->url(
		array(
			'controller' => 'startups',
			'action' => 'index',
		),
		true
	),
	'description' => __('Latest Startups on Digisqure'),
	'lang' => 'fr-fr'
));

foreach ($startups as $startup) {
	$link = $this->Html->url(
		array(
			'controller' => 'startups',
			'action' => 'view',
			'id' => $startup['Startup']['id']
		),
		true
	);
	echo $this->Rss->item(
		array(),
		array(
			'title' => $startup['Startup']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermalink' => true),
			'description' => $this->Text->truncate($startup['Startup']['description'], 100),
			'pubDate' => $startup['Startup']['created']
		)
	);
}