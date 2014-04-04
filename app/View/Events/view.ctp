<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $event['Event']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $event['Event']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $event['Event']['id'])
		); ?>
		<h1><?php echo h($event['Event']['name']); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($event['Event']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Edition'); ?></td>
			<td><?php echo $this->Html->link($event['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $event['Edition']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Place'); ?></td>
			<td><?php echo $this->Html->link($event['Place']['name'], array('controller' => 'places', 'action' => 'view', 'id' => $event['Place']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($event['Event']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Description'); ?></td>
			<td><?php echo h($event['Event']['description']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Start At'); ?></td>
			<td><?php echo h($event['Event']['start_at']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('End At'); ?></td>
			<td><?php echo h($event['Event']['end_at']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Status'); ?></td>
			<td><?php echo h($event['Event']['status']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Url'); ?></td>
			<td><?php echo h($event['Event']['url']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($event['Event']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($event['Event']['modified']); ?></td>
		</tr>
	</table>
</div>


		
	