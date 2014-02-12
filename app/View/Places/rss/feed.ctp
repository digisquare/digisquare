<?php
$this->set('channel', 
			array(
				'title' => __('Places'),
				'link' => $this->Html->url('/',true),
				'description' => __('Latest places added on Digisquare')
			)
);
	
foreach($places as $place) {
	$address = $place['Place']['address'].", "
		.$place['Place']['zipcode'].' '.$place['Place']['city'];
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
				'description' => $this->Text->truncate($address, 200),
				'pubDate' => $place['Place']['created']
			)
	);
}