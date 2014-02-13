<div class="organizations view">
<h2><?php echo __('Organization'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['Place']['name'], array('controller' => 'places', 'action' => 'view', 'id' => $organization['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $organization['Edition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		
		<dd>
			<?php echo h($organization['Organization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descritpion'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', 'id' => $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', 'id' => $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Editions'), array('controller' => 'editions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('controller' => 'editions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizers'), array('controller' => 'organizers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizer'), array('controller' => 'organizers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organizers'); ?></h3>
	<?php if (!empty($organization['Organizer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organization['Organizer'] as $organizer): ?>
		<tr>
			<td><?php echo $organizer['id']; ?></td>
			<td><?php echo $organizer['event_id']; ?></td>
			<td><?php echo $organizer['organization_id']; ?></td>
			<td><?php echo $organizer['created']; ?></td>
			<td><?php echo $organizer['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organizers', 'action' => 'view', 'id' => $organizer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organizers', 'action' => 'edit', $organizer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organizers', 'action' => 'delete', $organizer['id']), null, __('Are you sure you want to delete # %s?', $organizer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organizer'), array('controller' => 'organizers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
