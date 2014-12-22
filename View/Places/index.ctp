<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Merge'),
			array('controller' => 'places', 'action' => 'merge'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Create'),
			array('controller' => 'places', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right', 'style' => 'margin-right:10px;')
		); ?>
		<h1><?php echo __('Places'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('event_count'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($places as $place): ?>
			<tr>
				<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
				<td>
					<?php echo h($place['Place']['name']); ?> <br>
					<?php echo h($place['Place']['address']); ?> <br>
					<?php echo h($place['Place']['zipcode']); ?>&nbsp;<?php echo h($place['Place']['city']); ?>
				</td>
				<td>
					<?php echo $this->Html->link(
						h($place['Place']['event_count']),
						array(
							'controller' => 'events', 'action' => 'index', '?' => array(
								'place_id' => $place['Place']['id']
							)
						),
						array('class' => 'btn btn-default btn-sm')
					); ?>
				</td>
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
					<?php echo $this->Html->link(
						__('Organizations'),
						array('action' => 'organizations', 'id' => $place['Place']['id']),
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
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>