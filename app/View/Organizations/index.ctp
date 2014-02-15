<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Organization'),
			array('controller' => 'organizations', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
	  	); ?>
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Top 10'),
			array('controller' => 'organizations', 'action' => 'top'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Organizations'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($organizations as $organization): ?>
			<tr>
				<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(
						$organization['Place']['name'],
						array('controller' => 'places', 'action' => 'view', 'id' => $organization['Place']['id'])
					); ?>
				</td>
				<td>
					<?php echo $this->Html->link(
						$organization['Edition']['name'],
						array('controller' => 'editions', 'action' => 'view', 'id' => $organization['Edition']['id'])
					); ?>
				</td>
				<td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
				<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
				<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $organization['Organization']['id']),
						array('class' => 'btn btn-default')
					); ?>
					<?php echo $this->Html->link(
						__('Past Events'),
						array('action' => 'pastevents', 'id' => $organization['Organization']['id']),
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
					<?php echo $this->Form->postLink(
						__('Register'),
						array('action' => 'register', 'id' => $organization['Organization']['id']),
						array('class' => 'btn btn-default btn-sm'),
						__('Are you sure you want to register to # %s?', $organization['Organization']['name'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>	
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>