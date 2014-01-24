<div class="editions index">
	<h2><?php echo __('Editions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($editions as $edition): ?>
	<tr>
		<td><?php echo h($edition['Edition']['id']); ?>&nbsp;</td>
		<td><?php echo h($edition['Edition']['name']); ?>&nbsp;</td>
		<td><?php echo h($edition['Edition']['created']); ?>&nbsp;</td>
		<td><?php echo h($edition['Edition']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $edition['Edition']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $edition['Edition']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $edition['Edition']['id']), null, __('Are you sure you want to delete # %s?', $edition['Edition']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Edition'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Startups'), array('controller' => 'startups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Startup'), array('controller' => 'startups', 'action' => 'add')); ?> </li>
	</ul>
</div>
