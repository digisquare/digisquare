<div class="tags index">
	<h2><?php echo __('Tags'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tags as $tag): ?>
	<tr>
		<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
		<td><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
		<td><?php echo h($tag['Tag']['created']); ?>&nbsp;</td>
		<td><?php echo h($tag['Tag']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(
				__('View'),
				array('action' => 'view', 'id' => $tag['Tag']['id'])
			); ?>
			<?php echo $this->Html->link(
				__('Edit'),
				array('action' => 'edit', 'id' => $tag['Tag']['id'])
			); ?>
			<?php echo $this->Form->postLink(
				__('Delete'),
				array('action' => 'delete', 'id' => $tag['Tag']['id']),
				null,
				__('Are you sure you want to delete # %s?', $tag['Tag']['id'])
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
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Startups'), array('controller' => 'startups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Startup'), array('controller' => 'startups', 'action' => 'add')); ?> </li>
	</ul>
</div>
