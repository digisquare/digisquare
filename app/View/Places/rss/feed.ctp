<?php
$this->set('channelData', array(
	'title' => __('Latest Places on Digisquare'),
	'link' => $this->here,
	'description' => __('Latest Places on Digisqure'),
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
			'title' => $place['Place']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'description' => array(
				'value' => $place['Place']['address'] . '<br>' . $place['Place']['zipcode'] . ' ' . $place['Place']['city'],
				'convertEntities' => false,
				'cdata' => true,
			),
			'pubDate' => $place['Place']['created']
		)
	);	
}
