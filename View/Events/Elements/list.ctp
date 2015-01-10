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
$params = [];
if (isset($edition)) {
	$url['?']['edition_id'] = $edition['Edition']['id'];
	$controller = 'editions';
	${$controller} = $edition;
}
if (isset($place)) {
	$url['?']['place_id'] = $place['Place']['id'];
	$controller = 'places';
	${$controller} = $place;
	$params = [
		'place_id' => $place['Place']['id'],
		'bslug' => strtolower(Inflector::slug($place['Place']['name'], '-'))
	];
}
if (isset($organization)) {
	$url['?']['organization_id'] = $organization['Organization']['id'];
	$controller = 'organizations';
	${$controller} = $organization;
	$params = [
		'organization_id' => $organization['Organization']['id'],
		'bslug' => strtolower(Inflector::slug($organization['Organization']['name'], '-'))
	];
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
				array_merge([
					'controller' => 'events',
					'action' => 'index',
					'slug' => ${$controller}['Edition']['slug']
				], $params)
			); ?>
		</div>
	</div>
<?php endif; ?>
<?php echo $this->element(
	'../Events/Elements/pagination',
	['controller' => $controller, $controller => ${$controller}]
); ?>
