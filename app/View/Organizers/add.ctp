<div class="organizers form">
<?php echo $this->Form->create('Organizer'); ?>
	<fieldset>
		<legend><?php echo __('Add Organizer'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('organization_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Organizers'), array('action' => 'index')); ?></li>
	</ul>
</div>
