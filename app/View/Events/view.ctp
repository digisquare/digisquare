<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $event['Event']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $event['Event']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $event['Event']['id'])
		); ?>
		<h1><?php echo h($event['Event']['name']); ?></h1>
	</div>
	<p>
		<p style="background:#dcedcf; padding:10px; font-size:16px; text-align:right;">
			<?php 
			if ($userid != null) { // User is logged
				$table_affiliation = array (
					'1' => array('Rang' => '1', 'Nom' => 'Watch', 'Action' => 'watch'),
					'2' => array('Rang' => '2', 'Nom' => 'Like', 'Action' => 'like'),
					'3' => array('Rang' => '3', 'Nom' => 'Miss', 'Action' => 'miss'),
					'4' => array('Rang' => '4', 'Nom' => 'Attend', 'Action' => 'attend'),
					'5' => array('Rang' => '5', 'Nom' => 'Attend maybe', 'Action' => 'attend_maybe'),
					'6' => array('Rang' => '6', 'Nom' => 'Speak at', 'Action' => 'speak_at'),
					'7' => array('Rang' => '7', 'Nom' => 'Organize', 'Action' => 'organize'),
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
						array('action' => $tab['Action'], 'id' => $event['Event']['id']),
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
			<td><?php echo h($event['Event']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Edition'); ?></td>
			<td><?php echo $this->Html->link($event['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $event['Edition']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Place'); ?></td>
			<td><?php echo $this->Html->link($event['Place']['name'], array('controller' => 'places', 'action' => 'view', 'id' => $event['Place']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td><?php echo h($event['Event']['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Description'); ?></td>
			<td><?php echo h($event['Event']['description']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Start At'); ?></td>
			<td><?php echo h($event['Event']['start_at']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('End At'); ?></td>
			<td><?php echo h($event['Event']['end_at']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Status'); ?></td>
			<td><?php echo h($event['Event']['status']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Url'); ?></td>
			<td><?php echo h($event['Event']['url']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($event['Event']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($event['Event']['modified']); ?></td>
		</tr>
	</table>
</div>


		
	