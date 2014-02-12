<div class="organizers index">
	<h2><?php echo __('Organizers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizers as $organizer): ?>
	<tr>
		<td><?php echo h($organizer['Organizer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizer['Event']['name'], array('controller' => 'events', 'action' => 'view', 'id' => $organizer['Event']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizer['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', 'id' => $organizer['Organization']['id'])); ?>
		</td>
		<td><?php echo h($organizer['Organizer']['created']); ?>&nbsp;</td>
		<td><?php echo h($organizer['Organizer']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(
				__('View'),
				array('action' => 'view', 'id' => $organizer['Organizer']['id'])
			); ?>
			<?php echo $this->Html->link(
				__('Edit'),
				array('action' => 'edit', 'id' => $organizer['Organizer']['id'])
			); ?>
			<?php echo $this->Form->postLink(
				__('Delete'),
				array('action' => 'delete', 'id' => $organizer['Organizer']['id']),
				null,
				__('Are you sure you want to delete # %s?', $organizer['Organizer']['id'])
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
		<li><?php echo $this->Html->link(__('New Organizer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
