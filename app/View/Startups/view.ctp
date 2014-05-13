<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $startup['Startup']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $startup['Startup']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $startup['Startup']['id'])
		); ?>
		<h1><?php echo h($startup['Startup']['name']); ?></h1>
	</div>
	<p>
		<p style="background:#dcedcf; padding:10px; font-size:16px; text-align:right;">
			<?php 
			if ($userid != null) { // User is logged
				$table_affiliation = array (
					'1' => array('Rang' => '1', 'Nom' => 'Watch', 'Action' => 'watch'),
					'2' => array('Rang' => '2', 'Nom' => 'Like', 'Action' => 'like'),
					'4' => array('Rang' => '4', 'Nom' => 'Work for', 'Action' => 'work_for'),
					'6' => array('Rang' => '6', 'Nom' => 'Advise', 'Action' => 'advise'),
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
						array('action' => $tab['Action'], 'id' => $startup['Startup']['id']),
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
			<td><?php echo h($startup['Startup']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Edition'); ?></td>
			<td>
				<?php echo $this->Html->link(
					$startup['Edition']['name'],
					array(
						'controller' => 'editions',
						'action' => 'view',
						'id' => $startup['Edition']['id']
					)
				); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Description'); ?></td>
			<td><?php echo h($startup['Startup']['description']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Contacts'); ?></td>
			<td><?php echo h($startup['Startup']['contacts']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($startup['Startup']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($startup['Startup']['modified']); ?></td>
		</tr>
	</table>
</div>