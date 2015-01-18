<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Reset'),
			['controller' => 'editions', 'action' => 'reset'],
			['escape' => false, 'class' => 'btn btn-primary pull-right']
		); ?>
		<h1><?php echo __('Editions'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($editions as $edition): ?>
			<tr>
				<td><?php echo h($edition['Edition']['id']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['name']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['slug']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['created']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Link->viewEdition(
						__('View'),
						$edition,
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						['action' => 'edit', 'id' => $edition['Edition']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						['action' => 'delete', 'id' => $edition['Edition']['id']],
						['class' => 'btn btn-default btn-sm'],
						__('Are you sure you want to delete # %s?', $edition['Edition']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(['ul' => 'pagination']); ?>
</div>