<?php 
$title_for_layout = 'Digisquare, le calendrier des évènements du numérique à Bordeaux et Montpellier';
$this->set(compact('title_for_layout'));
$date = new DateTime('today');
$url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'end_at' => $date->format('Y-m-d'),
		'edition_id' => $this->Session->read('Edition.id'),
		'sort' => 'start_at',
		'direction' => 'asc',
		'limit' => 6
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
			<a href="http://montpellier.digisquare.net">Montpellier</a>.
		</p>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="row row-flex row-flex-wrap">
				<?php foreach ($events as $event): ?>
					<div class="col-xs-12 col-sm-6">
						<?php echo $this->element(
							'../Events/Elements/card',
							['event' => $event]
						); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-xs-12 col-md-4">
			<div id="twitter-home-timeline" data-screen-name="digisquare_bx"></div>
		</div>
	</div>
</div>