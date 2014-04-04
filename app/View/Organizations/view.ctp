<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $organization['Organization']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $organization['Organization']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $organization['Organization']['id'])
		); ?>
		<h1><?php echo h($organization['Organization']['name']); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($organization['Organization']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Places'); ?></td>
			<td>
				<?php echo $this->Html->link(
					$organization['Edition']['name'],
					 array(
					 	'controller' => 'editions',
					 	'action' => 'view',
					 	'id' => $organization['Edition']['id'])
				); ?>
				<?php echo $this->Html->link(
					$organization['Place']['name'],
					 array(
					  'controller' => 'places',
					  'action' => 'view',
					  'id' => $organization['Place']['id'])
				); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Edition'); ?></td>
			<td>
				<?php echo $this->Html->link(
					$organization['Edition']['name'],
					 array(
					 	'controller' => 'editions',
					 	'action' => 'view',
					 	'id' => $organization['Edition']['id'])
				); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($organization['Organization']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Description'); ?></td>
			<td><?php echo h($organization['Organization']['description']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($organization['Organization']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($organization['Organization']['modified']); ?></td>
		</tr>
	</table>
</div>