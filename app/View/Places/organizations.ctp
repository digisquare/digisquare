<div class="organizations view">

	<div class="page-header">
		<h2><?php echo __('Organization associated has the place'); ?></h2>
	</div>
		
	<table class="table table-bordered table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('Id'); ?></th>
		<th><?php echo $this->Paginator->sort('Place_id'); ?></th>
		<th><?php echo $this->Paginator->sort('Edition_id'); ?></th>
		<th><?php echo $this->Paginator->sort('Name'); ?></th>
		<th><?php echo $this->Paginator->sort('Description'); ?></th>		
		<th><?php echo $this->Paginator->sort('Created'); ?></th>
		<th><?php echo $this->Paginator->sort('Modified'); ?></th>
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
			<td><?php echo h($organization['Organization']['description']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
			<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>	
	<?php echo $this->Paginator->pagination(
		array('ul' => 'pagination')
	); ?>
</div>