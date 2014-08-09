<div role="main">
	<div class="places form">
		<h1><?php echo __('Merge Places'); ?></h1>
		<?php echo $this->Form->create('Place', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'col col-md-3 control-label'),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			),
			'class' => 'well form-horizontal'
		)); ?>
			<?php echo $this->Form->input('place_id_1', array(
				'options' => $places,
				'label' => 'Place 1'
			)); ?>
			<?php echo $this->Form->input('place_id_2', array(
				'options' => $places,
				'label' => 'Place 2'
			)); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit('Compare', array(
						'class' => 'btn btn-primary'
					)); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
		<?php if (isset($place_1) && isset($place_2)): ?>
			<?php echo $this->Form->create('Place', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => false,
					'wrapInput' => 'col col-md-9',
					'class' => 'form-control'
				),
				'class' => 'well form-horizontal'
			)); ?>
				<?php $this->request->data = $place_1; ?>
				<table class="table table-bordered table-striped">
					<tr>
						<td><?php echo __('Id'); ?></td>
						<td><?php echo h($place_1['Place']['id']); ?></td>
						<td><?php echo h($place_2['Place']['id']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Name'); ?></td>
						<td><?php echo $this->Form->input('name'); ?></td>
						<td><?php echo h($place_2['Place']['name']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Address'); ?></td>
						<td><?php echo $this->Form->input('address'); ?></td>
						<td><?php echo h($place_2['Place']['address']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Zipcode'); ?></td>
						<td><?php echo $this->Form->input('zipcode'); ?></td>
						<td><?php echo h($place_2['Place']['zipcode']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('City'); ?></td>
						<td><?php echo $this->Form->input('city'); ?></td>
						<td><?php echo h($place_2['Place']['city']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Country Code'); ?></td>
						<td><?php echo $this->Form->input('country_code'); ?></td>
						<td><?php echo h($place_2['Place']['country_code']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Latitude'); ?></td>
						<td><?php echo $this->Form->input('latitude'); ?></td>
						<td><?php echo h($place_2['Place']['latitude']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Longitude'); ?></td>
						<td><?php echo $this->Form->input('longitude'); ?></td>
						<td><?php echo h($place_2['Place']['longitude']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Events'); ?></td>
						<td><?php echo h($place_1['Place']['event_count']); ?></td>
						<td><?php echo h($place_2['Place']['event_count']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Created'); ?></td>
						<td><?php echo h($place_1['Place']['created']); ?></td>
						<td><?php echo h($place_2['Place']['created']); ?></td>
					</tr>
					<tr>
						<td><?php echo __('Modified'); ?></td>
						<td><?php echo h($place_1['Place']['modified']); ?></td>
						<td><?php echo h($place_2['Place']['modified']); ?></td>
					</tr>
				</table>
				<?php echo $this->Form->hidden('place_id_1', array('value' => $place_1['Place']['id'])); ?>
				<?php echo $this->Form->hidden('place_id_2', array('value' => $place_2['Place']['id'])); ?>
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