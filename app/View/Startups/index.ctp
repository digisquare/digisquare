<div class="startups index">
	<h2><?php echo __('Startups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('contacts'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($startups as $startup): ?>
	<tr>
		<td><?php echo h($startup['Startup']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($startup['Edition']['name'], array('controller' => 'editions', 'action' => 'view', $startup['Edition']['id'])); ?>
		</td>
		<td><?php echo h($startup['Startup']['name']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['description']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['contacts']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['created']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $startup['Startup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $startup['Startup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $startup['Startup']['id']), null, __('Are you sure you want to delete # %s?', $startup['Startup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Startup'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Editions'), array('controller' => 'editions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('controller' => 'editions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
