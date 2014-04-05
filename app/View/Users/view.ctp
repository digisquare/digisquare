<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $user['User']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $user['User']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $user['User']['id'])
		); ?>
		<h1><?php echo h($user['User']['username']); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($user['User']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Username'); ?></td>
			<td><?php echo h($user['User']['username']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Password'); ?></td>
			<td><?php echo h($user['User']['password']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Email'); ?></td>
			<td><?php echo h($user['User']['email']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($user['User']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($user['User']['modified']); ?></td>
		</tr>
	</table>
</div>