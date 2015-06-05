<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Merge'),
			['controller' => 'venues', 'action' => 'merge'],
			['escape' => false, 'class' => 'btn btn-primary pull-right']
		); ?>
		<h1><?php echo __('Venues'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('event_count'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($venues as $venue): ?>
			<tr>
				<td><?php echo h($venue['Venue']['id']); ?>&nbsp;</td>
				<td>
					<?php echo h($venue['Venue']['name']); ?> <br>
					<?php echo h($venue['Venue']['address']); ?> <br>
					<?php echo h($venue['Venue']['zipcode']); ?>&nbsp;<?php echo h($venue['Venue']['city']); ?>
				</td>
				<td>
					<?php echo $this->Html->link(
						h($venue['Venue']['event_count']),
						[
							'controller' => 'events',
							'action' => 'index',
							'admin' => false,
							'?' => [
								'venue_id' => $venue['Venue']['id']
							]
						],
						['class' => 'btn btn-default btn-sm']
					); ?>
				</td>
				<td><?php echo h($venue['Venue']['created']); ?>&nbsp;</td>
				<td><?php echo h($venue['Venue']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						['action' => 'view', 'id' => $venue['Venue']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						['action' => 'edit', 'id' => $venue['Venue']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Html->link(
						__('Organizations'),
						['action' => 'organizations', 'id' => $venue['Venue']['id']],
						['class' => 'btn btn-default btn-sm']
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						['action' => 'delete', 'id' => $venue['Venue']['id']],
						['class' => 'btn btn-default btn-sm'],
						__('Are you sure you want to delete # %s?', $venue['Venue']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(
		['ul' => 'pagination']
	); ?>
</div>