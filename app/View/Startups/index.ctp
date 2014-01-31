<div class="startups index">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Startup'),
			array('controller' => 'startups', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Startups'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('contacts'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($startups as $startup): ?>
	<tr>
		<td><?php echo h($startup['Startup']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($startup['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $startup['Edition']['id'])); ?>
		</td>
		<td><?php echo h($startup['Startup']['name']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['description']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['contacts']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['created']); ?>&nbsp;</td>
		<td><?php echo h($startup['Startup']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(
				__('View'),
				array('action' => 'view', 'id' => $startup['Startup']['id']),
				array('class' => 'btn btn-default btn-sm')
			); ?>
			<?php echo $this->Html->link(
				__('Edit'),
				array('action' => 'edit', 'id' => $startup['Startup']['id']),
				array('class' => 'btn btn-default btn-sm')
			); ?>
			<?php echo $this->Form->postLink(
				__('Delete'),
				array('action' => 'delete', 'id' => $startup['Startup']['id']),
				array('class' => 'btn btn-default btn-sm'),
				__('Are you sure you want to delete # %s?', $startup['Startup']['id'])
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-unstyled">
		<li><?php echo $this->Html->link(
				__('New Startup'), 
				array('action' => 'add'),
				array('class' => 'btn btn-primary btn-xs')
			); ?>
		</li>
		<li><?php echo $this->Html->link(
				__('List Editions'), 
				array('controller' => 'editions', 'action' => 'index'),
				array('class' => 'btn btn-primary btn-xs')
			); ?>
		</li>
		<li><?php echo $this->Html->link(
				__('New Edition'), 
				array('controller' => 'editions', 'action' => 'add'),
				array('class' => 'btn btn-primary btn-xs')
			); ?>
		</li>
		<li><?php echo $this->Html->link(
				__('List Tags'), 
				array('controller' => 'tags', 'action' => 'index'),
				array('class' => 'btn btn-primary btn-xs')
			); ?>
		</li>
		<li><?php echo $this->Html->link(
				__('New Tag'), 
				array('controller' => 'tags', 'action' => 'add'),
				array('class' => 'btn btn-primary btn-xs')
			); ?>
		</li>
	</ul>
</div>
