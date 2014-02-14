<?php
$this->set('channel', array(
	'title' => 'New Organizations',
	'link' => $this->Html->url('/', true),
	'description' => 'Newest Organizations created',
	'lang' => 'en-en'
	)
);

foreach ($organizations as $organization) {
	$link = $this->Html->url(array('controller' => 'Organizations', 'action' => 'view', 'id' => $organization['Organization']['id']), true);
	echo $this->Rss->item(array(), array(
		'title' => $organization['Organization']['name'],
		'link' => $link,
		'guid' => array('url' => $link, 'isPermalink' => true),
		'description' => $organization['Organization']['description'],
		'pubDate' => $organization['Organization']['created']
		)
	);
}
?>