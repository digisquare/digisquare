<?php
$this->set('channelData', array(
	'title' => __('Latest Organizations on Digisquare'),
	'link' => $this->here,
	'description' => __('Latest Organizations on Digisquare'),
));
foreach ($organizations as $organization) {
	$link = $this->Html->url(
		array(
			'controller' => 'organizations',
			'action' => 'view',
			'id' => $organization['Organization']['id']
		),
		true
	);
	echo $this->Rss->item(
		array(),
		array(
			'title' => $organization['Organization']['name'],
			'link' => $link,
			'guid' => array('url' => $link, 'isPermalink' => true),
			'description' => array(
				'value' => nl2br($organization['Organization']['description']),
				'convertEntities' => false,
				'cdata' => true,
			),
			'pubDate' => $organization['Organization']['created']
		)
	);
}
