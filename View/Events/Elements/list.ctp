<?php $url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'sort' => 'start_at',
		'direction' => 'asc',
	]
]; ?>
<h3>
	Tous les évènements
	<?php if (isset($this->request->query['date'])): ?>
		<?php $date = new DateTime($this->request->query['date']); ?>
		de <?php echo strftime('%B %Y', $date->getTimestamp()); ?>
	<?php else: ?>
		<?php $date = new DateTime(); ?>
		<?php $url['?']['end_at'] = $date->format('Y-m-d 00:00:00') ?>
		à venir :
	<?php endif; ?>
</h3>
<?php
if (isset($edition_id)) {
	$url['?']['edition_id'] = $id = $edition_id;
	$controller = 'editions';
}
if (isset($place_id)) {
	$url['?']['place_id'] = $id = $place_id;
	$controller = 'places';
}
if (isset($organization_id)) {
	$url['?']['organization_id'] = $id = $organization_id;
	$controller = 'organizations';
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
<?php echo $this->element(
	'../Events/Elements/pagination',
	['controller' => $controller, 'id' => $id]
); ?>
