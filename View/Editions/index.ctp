<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Edition'),
			array('controller' => 'editions', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Top 10'),
			array('controller' => 'editions', 'action' => 'top'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Editions'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($editions as $edition): ?>
			<tr>
				<td><?php echo h($edition['Edition']['id']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['name']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['created']); ?>&nbsp;</td>
				<td><?php echo h($edition['Edition']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $edition['Edition']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $edition['Edition']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $edition['Edition']['id']),
						array('class' => 'btn btn-default btn-sm'),
						__('Are you sure you want to delete # %s?', $edition['Edition']['id'])
					); ?>
					<?php echo $this->Html->link(
						__('Organizations'),
						array('action' => 'organizations', 'id' => $edition['Edition']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Places'),
						array('action' => 'places', 'id' => $edition['Edition']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>