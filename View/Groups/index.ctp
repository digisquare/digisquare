<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Create'),
			['controller' => 'groups', 'action' => 'add'],
			['escape' => false, 'class' => 'btn btn-primary pull-right']
		); ?>
		<h1><?php echo __('Groups'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('user_count'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($groups as $group): ?>
			<tr>
				<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['user_count']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						['action' => 'view', 'id' => $group['Group']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						['action' => 'edit', 'id' => $group['Group']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						['action' => 'delete', 'id' => $group['Group']['id']],
						['class' => 'btn btn-default btn-sm'],
						__('Are you sure you want to delete # %s?', $group['Group']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(['ul' => 'pagination']); ?>
</div>