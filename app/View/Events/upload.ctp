<div class="events form">
<?php echo $this->Form->create('Event', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Import Event'); ?></legend>
	<?php
		echo $this->Form->input('ical_file', array('label' => 'Import file', 'type' => 'file'));
		echo $this->Form->input('Url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
