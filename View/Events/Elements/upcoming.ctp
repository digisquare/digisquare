<?php
$url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'edition_id' => $edition['Edition']['id'],
		'date' => $date,
		'sort' => 'start_at',
		'direction' => 'asc'
	]
];
$events = $this->requestAction($url);
foreach ($events as $event) {
	echo $this->element('../Events/Elements/card', ['event' => $event]);
}