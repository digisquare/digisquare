<?php
$this->set('channel', array(
	'title' => __('Latest Events for '.$editions['Edition']['name'].' for on Digisquare'),
	'link' => $this->Html->url(
		array(
			'controller' => 'editions',
			'action' => 'index',
		),
		true
	),
	'description' => __('Latest Events for '.$editions['Edition']['name'].' on Digisqure'),
	'lang' => 'fr-fr'
));

foreach ($events as $event) {
	$link = $this->Html->url(
		array(
			'controller' => 'events',
			'action' => 'view',
			'id' => $event['Event']['id'],
		),
		true
	);
	
	echo $this->Rss->item(
		array(),
		array(
			'title'=> $event['Event']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'description' => ' Du '.$event['Event']['start_at'].' au '.$event['Event']['end_at'].'<br/>'.nl2br($this->Text->truncate($event['Event']['description'], 200)),
			'pubDate' => $event['Event']['created'],
		)
	);
	
}