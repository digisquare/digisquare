<?php
$this->set('channel', 
			array(
				'title' => __('Events'),
				'link' => $this->Html->url('/',true),
				'description' => __('Latest events added on Digisquare')
			)
);
	
foreach($events as $event) {
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
				'description' => $this->Text->truncate($event['Event']['description'], 200),
				'pubDate' => $event['Event']['created']
			)
	);
}