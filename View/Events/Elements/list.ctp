<?php
$url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'end_at' => date('Y-m-d'),
		'sort' => 'start_at',
		'direction' => 'asc',
	]
];
if (isset($edition_id)) {
	$url['?']['edition_id'] = $edition_id;
}
if (isset($place_id)) {
	$url['?']['place_id'] = $place_id;
}
$events = $this->requestAction($url);
foreach ($events as $event) {
	echo $this->element(
		'../Events/Elements/card',
		['event' => $event]
	);
}
if (empty($events)):
	unset($url['?']['end_at']);
	unset($url['?']['limit']);
	$url['?']['direction'] = 'desc';
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">
				Aucun évènement
			</h1>
		</div>
		<div class="panel-body">
			<?php echo $this->Html->link(
				'Voir tous évènements',
				[
					'controller' => 'events',
					'action' => 'index',
					'?' => $url['?']
				]
			); ?>
		</div>
	</div>
<?php endif; ?>