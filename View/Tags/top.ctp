<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Tag'), 
			array('controller' => 'tags', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Tags - Top 10'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Events</th>
			<th>Created</th>
			<th>Modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($tags as $tag): ?>
			<tr>
				<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
				<td><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
				<td><?php echo h($tag[0]['count']); ?>&nbsp;</td>
				<td><?php echo h($tag['Tag']['created']); ?>&nbsp;</td>
				<td><?php echo h($tag['Tag']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $tag['Tag']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $tag['Tag']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $tag['Tag']['id']),
						array('class' => 'btn btn-default btn-sm'),
						null,
						__('Are you sure you want to delete # %s?', $tag['Tag']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>