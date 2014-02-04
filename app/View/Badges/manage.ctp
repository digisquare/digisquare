<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Badge'),
			array('controller' => 'badges', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<h1><?php echo __('Badges'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('icon'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($badges as $badge): ?>
			<tr>
				<td><?php echo h($badge['Badge']['id']); ?>&nbsp;</td>
				<td><img src="../img/badges/<?php echo h($badge['Badge']['icon']); ?>" alt="..." width="80">&nbsp;</td>
				<td><?php echo h($badge['Badge']['name']); ?>&nbsp;</td>
				<td><?php echo h($badge['Badge']['description']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(
						__('View'),
						array('action' => 'view', 'id' => $badge['Badge']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						array('action' => 'edit', 'id' => $badge['Badge']['id']),
						array('class' => 'btn btn-default btn-sm')
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						array('action' => 'delete', 'id' => $badge['Badge']['id']),
						array('class' => 'btn btn-default btn-sm'),
						__('Are you sure you want to delete # %s?', $badge['Badge']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>
