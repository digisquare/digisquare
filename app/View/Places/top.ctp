<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Place'),
			array('controller' => 'places', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Places - Top 10'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Id</th>
			<th>Edition</th>
			<th>Name</th>
			<th>Nombre</th>
			<th>Created</th>
			<th>Modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($places as $place): ?>
			<tr>
				<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(
						$place['City']['name'],
						array(
							'controller' => 'editions',
							'action' => 'view',
							'name' => $place['City']['name']
						)
					); ?>
				</td>
				<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
				<td><?php echo h($place[0]['count']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['created']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $place['Place']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $place['Place']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $place['Place']['id']),
						array('class' => 'btn btn-default btn-sm'),
						__('Are you sure you want to delete # %s?', $place['Place']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>