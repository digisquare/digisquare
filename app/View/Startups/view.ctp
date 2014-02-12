<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $startup['Startup']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $startup['Startup']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $startup['Startup']['id'])
		); ?>
		<h1><?php echo h($startup['Startup']['name']); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($startup['Startup']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Edition'); ?></td>
			<td>
				<?php echo $this->Html->link(
					$startup['Edition']['name'],
					array(
						'controller' => 'editions',
						'action' => 'view',
						'id' => $startup['Edition']['id']
					)
				); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Description'); ?></td>
			<td><?php echo h($startup['Startup']['description']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Contacts'); ?></td>
			<td><?php echo h($startup['Startup']['contacts']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($startup['Startup']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($startup['Startup']['modified']); ?></td>
		</tr>
	</table>
</div>