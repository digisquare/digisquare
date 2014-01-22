<div class="startups view">
<h2><?php echo __('Startup'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edition Id'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['edition_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contacts'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['contacts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($startup['Startup']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Startup'), array('action' => 'edit', $startup['Startup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Startup'), array('action' => 'delete', $startup['Startup']['id']), null, __('Are you sure you want to delete # %s?', $startup['Startup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Startups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Startup'), array('action' => 'add')); ?> </li>
	</ul>
</div>
