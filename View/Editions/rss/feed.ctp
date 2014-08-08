<?php
$this->set('channelData', array(
	'title' => __('Latest Events for ' . $edition['Edition']['name'] . ' on Digisquare'),
	'link' => $this->here,
	'description' => __('Latest Events for ' . $edition['Edition']['name'] . ' on Digisquare'),
));
foreach ($edition['Event'] as $event) {
	$link = $this->Html->url(
		array(
			'controller' => 'events',
			'action' => 'view',
			'id' => $event['id'],
		),
		true
	);
	echo $this->Rss->item(
		array(),
		array(
			'title' => $event['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'description' => array(
				'value' => 'Du '.$event['start_at']	. ' au ' . $event['end_at'] . '<br/>'
				. nl2br($event['description']),
				'convertEntities' => false,
				'cdata' => true,
			),
			'pubDate' => $event['created'],
		)
	);	
}
