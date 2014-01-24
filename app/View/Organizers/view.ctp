<div class="organizers view">
<h2><?php echo __('Organizer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizer['Organizer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizer['Event']['name'], array('controller' => 'events', 'action' => 'view', $organizer['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizer['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizer['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organizer['Organizer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($organizer['Organizer']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organizer'), array('action' => 'edit', $organizer['Organizer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organizer'), array('action' => 'delete', $organizer['Organizer']['id']), null, __('Are you sure you want to delete # %s?', $organizer['Organizer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
