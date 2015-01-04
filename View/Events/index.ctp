<div role="main">
	<div class="page-header">
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
			'<i class="icon-plus-sign icon-white"></i> ' .__('Create'), 
			array('controller' => 'events', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right', 'style' => 'margin-right:10px;')
		); ?>
		<h1><?php echo __('Events'); ?></h1>
	</div>
	<div class="row">
		<?php foreach ($events as $event): ?>
			<div class="col-md-6">
				<?php echo $this->element(
					'../Events/Elements/card',
					['event' => $event]
				); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>