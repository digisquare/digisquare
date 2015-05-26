<?php if (isset($edition)) {
	$title = 'Les acteurs du numérique à ' . $this->Link->viewEdition($edition);
	$this->set('title_for_layout', 'Tous les acteurs du numériques à ' . $edition['Edition']['name']);
	$url = ['slug' => $edition['Edition']['slug']];
} else {
	$title = 'Les acteurs du numérique en France';
	$this->set('title_for_layout', 'Tous les acteurs du numériques en France');
	$url = [];
} ?>
<div role="main">
	<div class="page-header">
		<div class="btn-group pull-right" style="margin:5px 0 0 0;">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				Trier par <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li>
					<?php echo $this->Html->link('Evènements récents',
						$url
					); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Evènements totaux',
						array_merge(
							$url,
							['?' => ['sort' => 'event_count', 'direction' => 'desc']]
						)
					); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Nom',
						array_merge(
							$url,
							['?' => ['sort' => 'name', 'direction' => 'asc']]
						)
					); ?>
				</li>
			</ul>
		</div>
		<h1><?php echo $title; ?></h1>
	</div>
	<div class="row row-flex row-flex-wrap">
		<?php foreach ($organizations as $organization): ?>
			<div class="col-xs-12 col-sm-6">
				<?php echo $this->element(
					'../Organizations/Elements/card',
					['organization' => $organization]
				); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php echo $this->Paginator->pagination([
		'ul' => 'pagination',
		'url' => $url
	]); ?>
</div>