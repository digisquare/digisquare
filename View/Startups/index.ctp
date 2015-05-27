<?php if (isset($edition)) {
	$title = 'Les startups de ' . $this->Link->viewEdition($edition);
	$this->set('title_for_layout', 'Toutes les startups de ' . $edition['Edition']['name']);
	$url = ['slug' => $edition['Edition']['slug']];
} else {
	$title = 'Les startups de France';
	$this->set('title_for_layout', 'Toutes les startups de France');
	$url = [];
} ?>
<div role="main">
	<div class="page-header">
		<h1><?php echo $title; ?></h1>
	</div>
	<div class="row row-flex row-flex-wrap">
		<?php foreach ($startups as $startup): ?>
			<div class="col-xs-12 col-sm-6">
				<?php echo $this->element(
					'../Startups/Elements/card',
					['startup' => $startup]
				); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php echo $this->Paginator->pagination([
		'ul' => 'pagination',
		'url' => $url
	]); ?>
</div>