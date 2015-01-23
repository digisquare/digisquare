<?php
$this->set('channelData', array(
	'title' => __('Latest Venues on Digisquare'),
	'link' => $this->here,
	'description' => __('Latest Venues on Digisquare'),
));
foreach ($venues as $venue) {
	$link = $this->Html->url(
		array(
			'controller' => 'venues',
			'action' => 'view',
			'id' => $venue['Venue']['id']
		),
		true
	);
	echo $this->Rss->item(
		array(),
		array(
			'title' => $venue['Venue']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermaLink' => 'true'),
			'description' => array(
				'value' => $venue['Venue']['address'] . '<br>' . $venue['Venue']['zipcode'] . ' ' . $venue['Venue']['city'],
				'convertEntities' => false,
				'cdata' => true,
			),
			'pubDate' => $venue['Venue']['created']
		)
	);	
}
