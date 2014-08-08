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
	<p>
		<p style="background:#dcedcf; padding:10px; font-size:16px; text-align:right;">
			<?php 
			if ($userid != null) { // User is logged
				$table_affiliation = array (
					'1' => array('Rang' => '1', 'Nom' => 'Watch', 'Action' => 'watch'),
					'2' => array('Rang' => '2', 'Nom' => 'Like', 'Action' => 'like'),
					'4' => array('Rang' => '4', 'Nom' => 'Visit', 'Action' => 'visit'),
					'7' => array('Rang' => '7', 'Nom' => 'Run', 'Action' => 'run'),
					'8' => array('Rang' => '8', 'Nom' => 'Manage', 'Action' => 'manage'),
				);
				
				foreach ($table_affiliation as $t => $tab) {
					$not = "";
					$btn = "btn-primary";
					foreach ($affiliations as $a => $aff) {
						if ($aff['Affiliation']['status'] == $tab['Rang']) {
							$not = __("Not ");
							$btn = "btn-danger";
							break;
						}
					}
					echo $this->Html->link(
						'<i class="icon-plus-sign "></i> ' . $not . __($tab['Nom']),
						array('action' => $tab['Action'], 'id' => $place['Place']['id']),
						array('escape' => false, 'class' => 'btn ' . $btn)
					);
				}
			} else { // User is not logged
				echo __("You're not logged. Please ".$this->Html->link(__('log in'), array('controller' => 'users', 'action' => 'login'))." to participate.");
			}?>
		</p>
	</p>
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