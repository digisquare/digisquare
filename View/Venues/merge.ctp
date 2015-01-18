<div role="main">
	<div class="places form">
		<h1><?php echo __('Merge Venues'); ?></h1>
		<?php echo $this->Form->create('Venue', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'col col-md-3 control-label'),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			),
			'class' => 'well form-horizontal'
		)); ?>
			<?php echo $this->Form->input('venue_id_1', array(
				'options' => $venues,
				'label' => 'Venue 1',
				'class' => 'form-control chzn-select'
			)); ?>
			<?php echo $this->Form->input('venue_id_2', array(
				'options' => $venues,
				'label' => 'Venue 2',
				'class' => 'form-control chzn-select'
			)); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit('Compare', array(
						'class' => 'btn btn-primary'
					)); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
		<?php if (isset($venue_1) && isset($venue_2)): ?>
			<?php echo $this->Form->create('Venue', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => false,
					'wrapInput' => 'col col-md-9',
					'class' => 'form-control'
				),
				'class' => 'well form-horizontal'
			)); ?>
				<?php $this->request->data = $venue_1; ?>
				<table class="table table-bordered table-striped">
					<tr>
						<td><?php echo __('Id'); ?></td>
						<td><?php echo h($venue_1['Venue']['id']); ?></td>
						<td><?php echo h($venue_2['Venue']['id']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Name'); ?></td>
						<td><?php echo $this->Form->input('name'); ?></td>
						<td><?php echo h($venue_2['Venue']['name']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Address'); ?></td>
						<td><?php echo $this->Form->input('address'); ?></td>
						<td><?php echo h($venue_2['Venue']['address']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Zipcode'); ?></td>
						<td><?php echo $this->Form->input('zipcode'); ?></td>
						<td><?php echo h($venue_2['Venue']['zipcode']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('City'); ?></td>
						<td><?php echo $this->Form->input('city'); ?></td>
						<td><?php echo h($venue_2['Venue']['city']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Country Code'); ?></td>
						<td><?php echo $this->Form->input('country_code'); ?></td>
						<td><?php echo h($venue_2['Venue']['country_code']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Latitude'); ?></td>
						<td><?php echo $this->Form->input('latitude'); ?></td>
						<td><?php echo h($venue_2['Venue']['latitude']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Longitude'); ?></td>
						<td><?php echo $this->Form->input('longitude'); ?></td>
						<td><?php echo h($venue_2['Venue']['longitude']); ?></td>
					</tr>
					<tr>
						<td colspan="3">
							<a onclick="toggle_visibility('mapIframe');">Coordonnées GPS Manuelles</a>
							<iframe id="mapIframe" style="display:none;" src="http://www.mapcoordinates.net/fr" width="100%" height="600px"></iframe>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Events'); ?></td>
						<td><?php echo h($venue_1['Venue']['event_count']); ?></td>
						<td><?php echo h($venue_2['Venue']['event_count']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Created'); ?></td>
						<td><?php echo h($venue_1['Venue']['created']); ?></td>
						<td><?php echo h($venue_2['Venue']['created']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Modified'); ?></td>
						<td><?php echo h($venue_1['Venue']['modified']); ?></td>
						<td><?php echo h($venue_2['Venue']['modified']); ?></td>
					</tr>
				</table>
				<?php echo $this->Form->hidden('venue_id_1', array('value' => $venue_1['Venue']['id'])); ?>
				<?php echo $this->Form->hidden('venue_id_2', array('value' => $venue_2['Venue']['id'])); ?>
				<?php echo $this->Form->hidden('merge', array('value' => true)); ?>
				<div class="form-group">
					<div class="col col-md-9 col-md-offset-3">
						<?php echo $this->Form->submit('Edit & Merge', array(
							'class' => 'btn btn-primary'
						)); ?>
					</div>
				</div>
			<?php echo $this->Form->end(); ?>
		<?php endif; ?>
	</div>
</div>