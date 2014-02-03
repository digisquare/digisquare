<div class="badges form">
<?php echo $this->Form->create('Badge'); ?>
	<fieldset>
		<legend><?php echo __('Edit Badge'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('minimum');
		echo $this->Form->input('description');
		echo $this->Form->input('icon');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Badge.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Badge.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Badges'), array('action' => 'index')); ?></li>
	</ul>
</div>
