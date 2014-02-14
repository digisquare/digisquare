<?php
$this->set('channel', array(
	'title' => __('Latest Events by for Editions on Digisquare'),
	'link' => $this->Html->url(
		array(
			'controller' => 'editions',
			'action' => 'index',
		),
		true
	),
	'description' => __('Latest Events by Editions on Digisqure'),
	'lang' => 'fr-fr'
));

foreach ($events as $event) {
	$link = $this->Html->url(
		array(
			'controller' => 'events',
			'action' => 'view',
			'id' => $event['Event']['id']
		),
		true
	);
	
	echo $this->Rss->item(
		array(),
		array(
			'title'=> $event['Event']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'description' => $this->Text->truncate($event['Event']['description'], 100),
			'pubDate' => $event['Event']['created']
		)
	);
	
}