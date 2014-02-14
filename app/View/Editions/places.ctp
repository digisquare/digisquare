<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Places'),
			array('controller' => 'places', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
	  	); ?>
		<h1><?php echo __('Places');?></h1>
	</div>	
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('zipcode'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('country_code'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($places as $place): ?>
			<tr>
				<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link(
						$place['Edition']['name'],
						array('controller' => 'editions', 'action' => 'view', 'id' => $place['Edition']['id'])
					); ?>
				</td>
				<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['address']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['zipcode']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['city']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['country_code']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['latitude']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['longitude']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['created']); ?>&nbsp;</td>
				<td><?php echo h($place['Place']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('controller' => 'places', 'action' => 'view', 'id' => $place['Place']['id']),
						array('class' => 'btn btn-default')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('controller' => 'places', 'action' => 'edit', 'id' => $place['Place']['id']),
						array('class' => 'btn btn-default')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('controller' => 'places', 'action' => 'delete', 'id' => $place['Place']['id']),
						array('class' => 'btn btn-default'),
						null,
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