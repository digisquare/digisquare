<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $edition['Edition']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $edition['Edition']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $edition['Edition']['id'])
		); ?>
		<h1><?php echo h($edition['Edition']['name']); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($edition['Edition']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($edition['Edition']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($edition['Edition']['modified']); ?></td>
		</tr>
	</table>
</div>