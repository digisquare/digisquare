<?php 
$title_for_layout = 'Digisquare, le calendrier des évènements du numérique à Bordeaux et Montpellier';
$this->set(compact('title_for_layout'));
$date = new DateTime('today');
if (isset($this->request->query['page'])) {
	$page = $this->request->query['page'];
} else {
	$page = 1;
}
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
		<p></p>
		<?php echo $this->Form->create('Campaign', [
			'action' => 'subscribe',
			'class' => 'form-horizontal'
		]); ?>
			<div class="form-group">
				<label for="EditionEmail" class="col col-md-4 control-label">Directement dans votre boite mail :</label>
				<div class="col col-md-6">
					<?php echo $this->Form->input('email', [
						'placeholder' => strtolower($this->Session->read('Edition.name')) . '@digisquare.net',
						'label' => false,
						'class' => 'form-control',
						'required' => true
					]); ?>
				</div>
				<div class="col col-md-2">
					<?php echo $this->Form->submit(
						'Inscription',
						['class' => 'btn btn-primary']
					); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
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
	<?php try {
		$url['?'] += ['page' => $page + 1];
		$this->requestAction($url);
		$nextPage = true;
	} catch (Exception $e) {
		$nextPage = false;
	} ?>
	<?php if ($page > 1 || $nextPage): ?>
		<ul class="pagination">
			<?php if (2 == $page): ?>
				<li>
					<?php echo $this->Html->link(
						'< ',
						['controller' => 'pages', 'action' => 'display', 'home']
					); ?>
				</li>
			<?php elseif ($page > 2): ?>
				<li>
					<?php echo $this->Html->link(
						'< ',
						['controller' => 'pages', 'action' => 'display', 'home', '?' => ['page' => $page - 1]]
					); ?>
				</li>
			<?php endif; ?>
			<?php if ($nextPage): ?>
				<li>
					<?php echo $this->Html->link(
						' >',
						['controller' => 'pages', 'action' => 'display', 'home', '?' => ['page' => $page + 1]]
					); ?>
				</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>