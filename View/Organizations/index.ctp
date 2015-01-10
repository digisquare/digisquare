<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('New Organization'),
			array('controller' => 'organizations', 'action' => 'add'),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
	  	); ?>
		<h1><?php echo __('Organizations'); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('place_id'); ?></th>
			<th><?php echo $this->Paginator->sort('edition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($organizations as $organization): ?>
			<tr>
				<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Link->viewPlace(
						$organization['Place']['name'],
						$organization
					); ?>
				</td>
				<td>
					<?php echo $this->Link->viewEdition(
						$organization['Edition']['name'],
						$organization
					); ?>
				</td>
				<td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
				<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
				<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Link->viewOrganization(
						__('View'),
						$organization,
						['class' => 'btn btn-default']
					); ?>
					<?php echo $this->Html->link(
						__('Edit'),
						['action' => 'edit', 'id' => $organization['Organization']['id']],
						['class' => 'btn btn-default']
					); ?>
					<?php echo $this->Form->postLink(
						__('Delete'),
						['action' => 'delete', 'id' => $organization['Organization']['id']],
						['class' => 'btn btn-default'],
						null,
						__('Are you sure you want to delete # %s?', $organization['Organization']['id'])
					); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>	
	<?php echo $this->Paginator->pagination(['ul' => 'pagination']); ?>
</div>