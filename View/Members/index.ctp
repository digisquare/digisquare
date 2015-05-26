<div role="main">
	<div class="page-header">
		<h1><?php echo __('Members'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($members as $member): ?>
			<tr>
				<td><?php echo h($member['Member']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Link->viewUser($member); ?>&nbsp;</td>
				<td><?php echo $this->Link->viewOrganization($member); ?>&nbsp;</td>
				<td><?php echo h($member['Member']['created']); ?>&nbsp;</td>
				<td><?php echo h($member['Member']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						['action' => 'view', 'id' => $member['Member']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						['action' => 'edit', 'id' => $member['Member']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						['action' => 'delete', 'id' => $member['Member']['id']],
						['class' => 'btn btn-default btn-sm'],
						__('Are you sure you want to delete # %s?', $member['Member']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(['ul' => 'pagination']); ?>
</div>