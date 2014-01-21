<div class="startupTags view">
<h2><?php echo __('Startup Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($startupTag['StartupTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startup Id'); ?></dt>
		<dd>
			<?php echo h($startupTag['StartupTag']['startup_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag Id'); ?></dt>
		<dd>
			<?php echo h($startupTag['StartupTag']['tag_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Startup Tag'), array('action' => 'edit', $startupTag['StartupTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Startup Tag'), array('action' => 'delete', $startupTag['StartupTag']['id']), null, __('Are you sure you want to delete # %s?', $startupTag['StartupTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Startup Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Startup Tag'), array('action' => 'add')); ?> </li>
	</ul>
</div>
