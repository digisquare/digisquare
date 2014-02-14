<?php
$this->set('channel', array(
	'title' => __('Latest Editions on Digisquare'),
	'link' => $this->Html->url(
		array(
			'controller' => 'editions',
			'action' => 'index',
		),
		true
	),
	'description' => __('Latest Editions on Digisqure'),
	'lang' => 'fr-fr'
));

foreach ($editions as $edition) {
	$link = $this->Html->url(
		array(
			'controller' => 'editions',
			'action' => 'view',
			'id' => $edition['Edition']['id']
		),
		true
	);
	
	echo $this->Rss->item(
		array(),
		array(
			'title'=> $edition['Edition']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'pubDate' => $edition['Edition']['created']
		)
	);
	
}