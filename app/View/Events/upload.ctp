<div class="events form">
<?php echo $this->Form->create('Import file'); ?>
	<fieldset>
		<legend><?php echo __('Import Event'); ?></legend>
	<?php
		echo $this->Form->input('Import_file');
		echo $this->Form->input('URL');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
