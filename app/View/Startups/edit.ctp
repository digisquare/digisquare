<div class="startups form">
<?php echo $this->Form->create('Startup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Startup'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('edition_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('contacts');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Startup.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Startup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Startups'), array('action' => 'index')); ?></li>
	</ul>
</div>
