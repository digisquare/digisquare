<div class="organizations view">

	<div class="page-header">
		<h2><?php echo __('Organization associated has the place'); ?></h2>
	</div>
		
	<table class="table table-bordered table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('place_id'); ?></th>
		<th><?php echo __('edition_id'); ?></th>
		<th><?php echo __('name'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('created'); ?></th>
		<th><?php echo __('modified'); ?></th>
	</tr>
	<?php foreach ($organizations as $organization): ?>
		<tr>
			<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link(
					$organization['Place']['name'],
					array('controller' => 'places', 'action' => 'view', 'id' => $organization['Place']['id'])
				); ?>
			</td>
			<td>
				<?php echo $this->Html->link(
					$organization['Edition']['name'],
					array('controller' => 'editions', 'action' => 'view', 'id' => $organization['Edition']['id'])
				); ?>
			</td>
			<td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['descritpion']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>	
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>