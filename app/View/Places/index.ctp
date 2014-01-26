<div class="places index">
	<h2><?php echo __('Places'); ?></h2>
	<table cellpadding="0" cellspacing="0">
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
			<?php echo $this->Html->link($place['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $place['Edition']['id'])); ?>
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
				array('action' => 'view', 'id' => $place['Place']['id'])
			); ?>
			<?php echo $this->Html->link(
				__('Edit'),
				array('action' => 'edit', 'id' => $place['Place']['id'])
			); ?>
			<?php echo $this->Form->postLink(
				__('Delete'),
				array('action' => 'delete', 'id' => $place['Place']['id']),
				null,
				__('Are you sure you want to delete # %s?', $place['Place']['id'])
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Editions'), array('controller' => 'editions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('controller' => 'editions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
