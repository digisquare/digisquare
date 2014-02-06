<?php 

	$this->set('channel', array(
	    'title' => 'Derniers Ajout de Startup',
	    'link' => $this->Html->url('/', true),
	    'description' => 'Derniers Ajout de Startup',
	    'lang' => 'fr-fr'
	));
	
	
	foreach($startups as $startup){
	    $link = $this->Html->url(array('controller' => 'Startups', 'action' => './', $startup['Startup']['id']),true);
	    echo $this->Rss->item(array(),array(
	        'title' => $startup['Startup']['name'],
	        'link' => $link,
	        'guid' => array('url' => $link, 'isPermalink' => true),
	        'description' => $this->Text->truncate($startup['Startup']['description'],100),
	        'pubDate' => $startup['Startup']['created']
	    ));
	}