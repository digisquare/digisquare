<div class="startupTags form">
<?php echo $this->Form->create('StartupTag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Startup Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('startup_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StartupTag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StartupTag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Startup Tags'), array('action' => 'index')); ?></li>
	</ul>
</div>
