<div class="events form">
<?php echo $this->Form->create('Import file'); ?>
	<fieldset>
		<legend><?php echo __('Import Event'); ?></legend>
	<?php
		echo $this->Form->input('file', array('label' => 'Import file', 'type' => 'file'));
		echo $this->Form->input('Url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
