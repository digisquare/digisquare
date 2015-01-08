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
		<div class="col-md-8">
			<?php echo $this->element(
				'../Events/Elements/calendar',
				['edition_id' => $edition['Edition']['id']]
			); ?>
			<?php if(isset($this->request->query['date']) && date('Y-m') !== $this->request->query['date']) {
				$date = new DateTime($this->request->query['date']);
			} else {
				$date = new DateTime();
			} ?>
			<ul class="pagination">
				<li>
					<?php $date->modify('-1 month'); ?>
					<?php echo $this->Html->link(
						'< ' . strftime('%B', $date->getTimestamp()),
						[
							'controller' => 'editions',
							'action' => 'view',
							'slug' => $edition['Edition']['slug'],
							'?' => ['date' => $date->format('Y-m')]
						]
					); ?>
				</li>
				<?php $date->modify('+1 month'); ?>
				<li class="current disabled">
					<?php echo $this->Html->link(
						strftime('%B', $date->getTimestamp()),
						[
							'controller' => 'editions',
							'action' => 'view',
							'slug' => $edition['Edition']['slug'],
							'?' => ['date' => $date->format('Y-m')]
						]
					); ?>
				</li>
				<li>
					<?php $date = $date->modify('+1 month'); ?>
					<?php echo $this->Html->link(
						strftime('%B', $date->getTimestamp()) . ' >',
						[
							'controller' => 'editions',
							'action' => 'view',
							'slug' => $edition['Edition']['slug'],
							'?' => ['date' => $date->format('Y-m')]
						]
					); ?>
				</li>
			</ul>
		</div>
		<div id="upcoming-events" class="col-md-4">
		</div>
	</div>
</div>