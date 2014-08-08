<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' .__('New Event'), 
			array('controller' => 'events', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?> 	
		<h1><?php echo __('Events'); ?></h1>
	</div>	
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('start_at'); ?></th>
			<th><?php echo $this->Paginator->sort('end_at'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($events as $event): ?>
			<tr>
				<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link(
					$event['Edition']['name'], array(
						'controller' => 'editions', 
						'action' => 'view', 
						'id' => $event['Edition']['id'])
					); 
				?></td>
				<td><?php echo $this->Html->link(
					$event['Place']['name'], array(
						'controller' => 'places', 
						'action' => 'view', 
						'id' => $event['Place']['id'])
					);
				?></td>
				<td><?php echo h($event['Event']['name']); ?>&nbsp;</td>
				<td><?php echo h($event['Event']['start_at']); ?>&nbsp;</td>
				<td><?php echo h($event['Event']['end_at']); ?>&nbsp;</td>
				<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
				<td><?php echo h($event['Event']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $event['Event']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $event['Event']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $event['Event']['id']),
						array('class' => 'btn btn-default btn-sm'),
						__('Are you sure you want to delete # %s?', $event['Event']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>

