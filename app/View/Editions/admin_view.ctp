<div class="editions view">
<h2><?php echo __('Edition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Edition'), array('action' => 'edit', $edition['Edition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Edition'), array('action' => 'delete', $edition['Edition']['id']), null, __('Are you sure you want to delete # %s?', $edition['Edition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Editions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('action' => 'add')); ?> </li>
	</ul>
</div>
