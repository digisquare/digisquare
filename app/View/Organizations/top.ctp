<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Organization'),
			array('controller' => 'organizations', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
	  	); ?>
		<h1><?php echo __('Organizations top 10'); ?></h1>
	</div>	
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo 'id'; ?></th>
			<th><?php echo 'name'; ?></th>
			<th><?php echo 'nb_event'; ?></th>
			<th><?php echo 'modified'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($organizations as $organization): ?>
			<tr>
				<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>				
				<td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
				<td><?php echo h($organization[0]['count']); ?>&nbsp;</td>
				<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
				<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $organization['Organization']['id']),
						array('class' => 'btn btn-default')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $organization['Organization']['id']),
						array('class' => 'btn btn-default')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $organization['Organization']['id']),
						array('class' => 'btn btn-default'),
						null,
						__('Are you sure you want to delete # %s?', $organization['Organization']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>