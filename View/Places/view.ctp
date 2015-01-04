<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $place['Place']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $place['Place']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $place['Place']['id'])
		); ?>		
		<h1><?php echo h($place['Place']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3>
				Tous les évènements
				<?php if(isset($this->request->query['date']) && date('Y-m') !== $this->request->query['date']): ?>
					<?php $date = new DateTime($this->request->query['date']); ?>
					de <?php echo strftime('%B %Y', $date->getTimestamp()); ?>
				<?php else: ?>
					<?php $date = new DateTime(); ?>
					à venir :
				<?php endif; ?>
			</h3>
			<?php echo $this->element(
				'../Events/Elements/list',
				['place_id' => $place['Place']['id']]
			); ?>
			<ul class="pagination">
				<li>
					<?php $date->modify('-1 month'); ?>
					<?php echo $this->Html->link(
						'< ' . strftime('%B', $date->getTimestamp()),
						[
							'controller' => 'places',
							'action' => 'view',
							'id' => $place['Place']['id'],
							'?' => ['date' => $date->format('Y-m')]
						]
					); ?>
				</li>
				<?php if(isset($this->request->query['date']) && date('Y-m') !== $this->request->query['date']): ?>
					<?php $date->modify('+1 month'); ?>
					<li class="current disabled">
						<?php echo $this->Html->link(
							strftime('%B', $date->getTimestamp()),
							[
								'controller' => 'places',
								'action' => 'view',
								'id' => $place['Place']['id'],
								'?' => ['date' => $date->format('Y-m')]
							]
						); ?>
					</li>
					<li>
						<?php $date = $date->modify('+1 month'); ?>
						<?php echo $this->Html->link(
							strftime('%B', $date->getTimestamp()) . ' >',
							[
								'controller' => 'places',
								'action' => 'view',
								'id' => $place['Place']['id'],
								'?' => ['date' => $date->format('Y-m')]
							]
						); ?>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="col-md-4">
			<?php echo $this->element(
				'../Places/Elements/card',
				['place' => $place]
			); ?>
		</div>
	</div>
</div>