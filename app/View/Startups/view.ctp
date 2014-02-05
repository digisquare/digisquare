<div class="startups view">
<h2><?php echo __('Startup'); ?></h2>
	<table class="table">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Edition'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Contacts'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
	</tr>
	<tr>
		<th>
			<?php echo h($startup['Startup']['id']); ?>
			&nbsp;
		</th>
		<th>
			<?php echo $this->Html->link($startup['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $startup['Edition']['id'])); ?>
			&nbsp;
		</th>
		<th>
			<?php echo h($startup['Startup']['name']); ?>
			&nbsp;
		</th>
		<th>
			<?php echo h($startup['Startup']['description']); ?>
			&nbsp;
		</th>
		<th>
			<?php echo h($startup['Startup']['contacts']); ?>
			&nbsp;
		</th>
		<th>
			<?php echo h($startup['Startup']['created']); ?>
			&nbsp;
		</th>
		<th>
			<?php echo h($startup['Startup']['modified']); ?>
			&nbsp;
		</th>
	</tr>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Edit Startup'), array('action' => 'edit', 'id' => $startup['Startup']['id']), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Startup'), array('action' => 'delete', 'id' => $startup['Startup']['id']), array('class' => 'btn btn-primary btn-xs'), __('Are you sure you want to delete # %s?', $startup['Startup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Startups'), array('action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('New Startup'), array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('List Editions'), array('controller' => 'editions', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('controller' => 'editions', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add' ), array('class' => 'btn btn-primary btn-xs')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($startup['Tag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($startup['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['name']; ?></td>
			<td><?php echo $tag['created']; ?></td>
			<td><?php echo $tag['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', 'id' => $tag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		</ul>
	</div>
</div>
