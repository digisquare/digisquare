<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('startups'), 
			array('controller' => 'tags', 'action' => 'startups'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Startups'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($tags as $tag): ?>
			<tr>
				<td><?php echo h($tag['Startup']['id']); ?>&nbsp;</td>
				<td><?php echo h($tag['Startup']['name']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $tag['Startup']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $tag['Startup']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $tag['Startup']['id']),
						array('class' => 'btn btn-default btn-sm'),
						null,
						__('Are you sure you want to delete # %s?', $tag['Tag']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>