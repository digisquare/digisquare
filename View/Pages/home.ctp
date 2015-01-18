<?php 
$date = new DateTime('today');
$url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'date' => $date->format('Y-m'),
		'edition_id' => $this->Session->read('Edition.id'),
		'sort' => 'start_at',
		'direction' => 'asc',
		'limit' => 9
	]
];
$events = $this->requestAction($url);
?>
<div role="main">
	<div class="jumbotron">
		<h1>Bienvenue sur Digisquare</h1>
		<p>
			Le calendrier des évènements du numérique à
			<a href="/bordeaux">Bordeaux</a> et
			<a href="/montpellier">Montpellier</a>.
		</p>
	</div>
	<div class="row row-flex row-flex-wrap">
		<?php foreach ($events as $event): ?>
			<div class="col-xs-12 col-sm-4">
				<?php echo $this->element(
					'../Events/Elements/card',
					['event' => $event]
				); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div id="twitter-timeline" data-screen-name="digisquare_bx"></div>
		</div>
		<div class="col-md-6">
			<div id="twitter-timeline" data-screen-name="digisquare_mtp"></div>
		</div>
	</div>
</div>