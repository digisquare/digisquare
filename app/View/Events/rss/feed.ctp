<?php
$this->set('channelData', array(
	'title' => __('Latest Events on Digisquare'),
	'link' => $this->here,
	'description' => __('Latest Events on Digisquare'),
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
			'title' => $event['Event']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'description' => array(
				'value' => 'Du '.$event['Event']['start_at']	. ' au ' . $event['Event']['end_at'] . '<br/>'
				. nl2br($event['Event']['description']),
				'convertEntities' => false,
				'cdata' => true,
			),
			'pubDate' => $event['Event']['created']
		)
	);
}
