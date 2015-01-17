<?php $title_for_layout = $group['Group']['name'];
$this->set(compact('title_for_layout')); ?>
<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			['action' => 'edit', 'id' => $group['Group']['id']],
			['escape' => false, 'class' => 'btn btn-primary pull-right']
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			['action' => 'delete', 'id' => $group['Group']['id']],
			['escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'],
			__('Are you sure you want to delete # %s?', $group['Group']['id'])
		); ?>
		<h1><?php echo h($group['Group']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-striped">
				<tr>
					<th><?php echo __('id'); ?></th>
					<th><?php echo __('username'); ?></th>
					<th><?php echo __('email'); ?></th>
					<th><?php echo __('created'); ?></th>
					<th><?php echo __('modified'); ?></th>
				</tr>
				<?php foreach ($group['User'] as $user['User']): ?>
					<tr>
						<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
						<td><?php echo $this->Link->viewUser($user); ?>&nbsp;</td>
						<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>