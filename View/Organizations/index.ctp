<?php if (isset($edition)) {
	$title = 'Annuaire du numérique à ' . $this->Link->viewEdition($edition);
	$this->set('title_for_layout', 'Tous les organisateurs d\'évènements numériques à ' . $edition['Edition']['name']);
	$url = ['slug' => $edition['Edition']['slug']];
} else {
	$title = 'Annuaire du numérique en France';
	$this->set('title_for_layout', 'Tous les organisateurs d\'évènements numériques en France');
	$url = [];
} ?>
<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Organization'),
			array('controller' => 'organizations', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
	  	); ?>
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
	<?php echo $this->Paginator->pagination(['ul' => 'pagination']); ?>
</div>