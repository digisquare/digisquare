<div role="main">
	<div class="page-header">
		<h1><?php echo __('Add Event'); ?></h1>
	</div>
	<div class="form">
		<?php echo $this->Form->create('Event', [
			'inputDefaults' => [
				'div' => 'form-group',
				'label' => [
					'class' => 'col col-md-3 control-label'
				],
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			],
			'class' => 'well form-horizontal'
		]); ?>
			<?php echo $this->Form->input('name'); ?>
			<?php echo $this->Form->input('edition_id',
				[
					'empty' => true,
					'class' => 'form-control chzn-select',
					'required' => false,
					'default' => $this->Session->read('Edition.id')
				]
			); ?>
			<?php echo $this->Form->input('venue_id',
				['empty' => true, 'class' => 'form-control chzn-select-deselect', 'required' => false]
			); ?>
			<?php echo $this->Form->input('Organization', 
				['empty' => true, 'class' => 'form-control chzn-select', 'required' => false]
			); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-2">
					<?php echo $this->Form->input('Venue.name', ['required' => false]); ?>
					<?php echo $this->Form->input('Venue.address'); ?>
					<?php echo $this->Form->input('Venue.zipcode'); ?>
					<?php echo $this->Form->input('Venue.city'); ?>
					<?php echo $this->Form->input('Venue.country_code'); ?>
					<?php echo $this->Form->input('Venue.latitude'); ?>
					<?php echo $this->Form->input('Venue.longitude'); ?>
				</div>
			</div>
			<?php echo $this->Form->input('uid'); ?>
			<?php echo $this->Form->input('description'); ?>
			<?php echo $this->Form->hidden('start_at', ['type' => 'text']); ?>
			<div class="form-group required">
				<label for="EventStartAt" class="col col-md-3 control-label">Start At</label>
				<div class="col col-md-3 required">
					<div class='input-group date' id='datetimepicker_startat_date'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="col col-md-3 required">
					<div class='input-group date' id='datetimepicker_startat_time'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
					</div>
				</div>
			</div>
			<?php echo $this->Form->hidden('end_at', ['type' => 'text']); ?>
			<div class="form-group required">
				<label for="EventStartAt" class="col col-md-3 control-label">End At</label>
				<div class="col col-md-3 required">
					<div class='input-group date' id='datetimepicker_endat_date'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="col col-md-3 required">
					<div class='input-group date' id='datetimepicker_endat_time'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
					</div>
				</div>
			</div>
			<?php echo $this->Form->input('status'); ?>
			<?php echo $this->Form->input('url'); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit(
						'Save changes',
						['class' => 'btn btn-primary']
					); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>