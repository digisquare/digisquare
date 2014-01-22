<div class="editions form">
<?php echo $this->Form->create('Edition'); ?>
	<fieldset>
		<legend><?php echo __('Add Edition'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Editions'), array('action' => 'index')); ?></li>
	</ul>
</div>
