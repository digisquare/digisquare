<?php
$this->set('channel', array(
	'title' => __('Latest Organizations on Digisquare'),
	'link' => $this->Html->url(
		array(
			'controller' => 'organizations',
			'action' => 'index',
		),
		true
	),
	'description' => __('Latest Organizations on Digisquare'),
	'lang' => 'fr-fr'
));

foreach ($organizations as $organization) {
	$link = $this->Html->url(
		array(
			'controller' => 'Organizations',
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
			'description' => $organization['Organization']['description'],
			'pubDate' => $organization['Organization']['created']
		)
	);
}
