<div class="organizations index">
		<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Organizations'),
			array('controller' => 'organizations', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
	  	); ?>
		<h1><?php echo __('Organizations'); ?></h1>
	</div>
	
	<table class="table table-bordered table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizations as $organization): ?>
	<tr>
		<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organization['Place']['name'], array('controller' => 'places', 'action' => 'view', 'id' => $organization['Place']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organization['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $organization['Edition']['id'])); ?>
		</td>
		<td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['description']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(
				__('View'),
				array('action' => 'view', 'id' => $organization['Organization']['id'])
			); ?>
			<?php echo $this->Html->link(
				__('Edit'),
				array('action' => 'edit', 'id' => $organization['Organization']['id'])
			); ?>
			<?php echo $this->Form->postLink(
				__('Delete'),
				array('action' => 'delete', 'id' => $organization['Organization']['id']),
				null,
				__('Are you sure you want to delete # %s?', $organization['Organization']['id'])
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
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add'),array('class' => 'btn btn-primary btn-xs') ); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index'),array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add'),array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('List Editions'), array('controller' => 'editions', 'action' => 'index'),array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('controller' => 'editions', 'action' => 'add'),array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizers'), array('controller' => 'organizers', 'action' => 'index'),array('class' => 'btn btn-primary btn-xs')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizer'), array('controller' => 'organizers', 'action' => 'add'),array('class' => 'btn btn-primary btn-xs')); ?> </li>
	</ul>
</div>
