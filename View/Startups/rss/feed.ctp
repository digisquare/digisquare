<?php
$this->set('channelData', array(
	'title' => __('Latest Startups on Digisquare'),
	'link' => $this->here,
	'description' => __('Latest Startups on Digisqure'),
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
			'description' => array(
				'value' => nl2br($startup['Startup']['description']),
				'convertEntities' => false,
				'cdata' => true,
			),
			'pubDate' => $startup['Startup']['created']
		)
	);
}
