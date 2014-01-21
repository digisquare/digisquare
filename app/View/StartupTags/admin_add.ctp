<div class="startupTags form">
<?php echo $this->Form->create('StartupTag'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Startup Tag'); ?></legend>
	<?php
		echo $this->Form->input('startup_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Startup Tags'), array('action' => 'index')); ?></li>
	</ul>
</div>
