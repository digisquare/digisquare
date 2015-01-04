<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $edition['Edition']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $edition['Edition']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $edition['Edition']['id'])
		); ?>
		<h1><?php echo h($edition['Edition']['name']); ?></h1>
	</div>
	<div class="row">
		<?php $date = isset($this->request->query['date']) ? $this->request->query['date'] : date('Y-m'); ?>
		<div class="col-md-8">
			<?php echo $this->element(
				'../Events/Elements/calendar',
				[
					'edition' => $edition,
					'date' => $date
				]
			); ?>
		</div>
		<div id="upcoming-events" class="col-md-4">
			<?php $key = 'upcoming-events-edition_id-' . $edition['Edition']['id'] . '-date-' . $date; ?>
			<?php echo $this->element(
				'../Events/Elements/upcoming',
				[
					'edition' => $edition,
					'date' => $date
				],
				['cache' => 
					[
						'key' => $key,
						'config' => 'element'
					]
				]
			); ?>
		</div>
	</div>
</div>