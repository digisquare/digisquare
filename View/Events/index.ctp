<?php if (isset($organization)) {
	$title = 'Tous les évènements ' . $this->Link->viewOrganization($organization);
	$this->set('title_for_layout', 'Tous les évènements du numérique de ' . $organization['Organization']['name']);
	$url = [
		'slug' => $edition['Edition']['slug'],
		'organization_id' => $organization['Organization']['id'],
		'bslug' => strtolower(Inflector::slug($organization['Organization']['name'], '-'))
	];
} else if (isset($venue)) {
	$title = 'Tous les évènements @ ' . $this->Link->viewVenue($venue);
	$this->set('title_for_layout', 'Tous les évènements du numérique @ ' . $venue['Venue']['name']);
	$url = [
		'slug' => $edition['Edition']['slug'],
		'venue_id' => $venue['Venue']['id'],
		'bslug' => strtolower(Inflector::slug($venue['Venue']['name'], '-'))
	];
} else if (isset($edition)) {
	$title = 'Tous les évènements à ' . $this->Link->viewEdition($edition);
	$this->set('title_for_layout', 'Tous les évènements du numérique à ' . $edition['Edition']['name']);
	$url = ['slug' => $edition['Edition']['slug']];
} else {
	$title = 'Tous les évènements';
	$this->set('title_for_layout', 'Tous les évènements du numérique en France');
	$url = [];
} ?>
<div role="main">
	<div class="page-header">
		<?php if (1 == $this->Session->read('Auth.User.group_id')): ?>
			<?php echo $this->Html->link(
				'<i class="icon-plus-sign icon-white"></i> ' .__('Google'),
				array('controller' => 'google_calendar_events', 'action' => 'index'),
				array('escape' => false, 'class' => 'btn btn-primary pull-right')
			); ?>
			<?php echo $this->Html->link(
				'<i class="icon-plus-sign icon-white"></i> ' .__('Upload'),
				array('controller' => 'events', 'action' => 'upload'),
				array('escape' => false, 'class' => 'btn btn-primary pull-right', 'style' => 'margin-right:10px;')
			); ?>
			<?php echo $this->Html->link(
				'<i class="icon-plus-sign icon-white"></i> ' .__('Import'),
				array('controller' => 'events', 'action' => 'import'),
				array('escape' => false, 'class' => 'btn btn-primary pull-right', 'style' => 'margin-right:10px;')
			); ?>
		<?php endif; ?>
		<h1><?php echo $title; ?></h1>
	</div>
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
	<?php echo $this->Paginator->pagination([
		'ul' => 'pagination',
		'url' => $url
	]); ?>
</div>