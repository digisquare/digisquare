<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $place['Place']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $place['Place']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $place['Place']['id'])
		); ?>		
		<h1><?php echo h($place['Place']['name']); ?></h1>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($place['Place']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Edition'); ?></td>
			<td>
				<?php echo $this->Html->link(
					$place['Edition']['name'],
					array(
						'controller' => 'editions',
						'action' => 'view',
						'id' => $place['Edition']['id']
					)
				); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($place['Place']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Address'); ?></td>
			<td><?php echo h($place['Place']['address']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Zipcode'); ?></td>
			<td><?php echo h($place['Place']['zipcode']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('City'); ?></td>
			<td><?php echo h($place['Place']['city']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Country Code'); ?></td>
			<td><?php echo h($place['Place']['country_code']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Latitude'); ?></td>
			<td><?php echo h($place['Place']['latitude']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Longitude'); ?></td>
			<td><?php echo h($place['Place']['longitude']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($place['Place']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($place['Place']['modified']); ?></td>
		</tr>
	</table>
</div>