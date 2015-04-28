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