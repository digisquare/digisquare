<div class="organizers form">
<?php echo $this->Form->create('Organizer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Organizer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('organization_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Organizer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Organizer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Organizers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
