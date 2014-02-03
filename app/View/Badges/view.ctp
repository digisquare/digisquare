<div class="badges view">
<h2><?php echo __('Badge'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minimum'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['minimum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($badge['Badge']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Badge'), array('action' => 'edit', $badge['Badge']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Badge'), array('action' => 'delete', $badge['Badge']['id']), null, __('Are you sure you want to delete # %s?', $badge['Badge']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Badges'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Badge'), array('action' => 'add')); ?> </li>
	</ul>
</div>
