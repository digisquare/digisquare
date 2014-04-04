<div class="events form">
<?php echo $this->Form->create('Import file'); ?>
	<fieldset>
		<legend><?php echo __('Import Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('edition_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('start_at');
		echo $this->Form->input('end_at');
		echo $this->Form->input('status');
		echo $this->Form->input('url');
		echo $this->Form->input('Tag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
