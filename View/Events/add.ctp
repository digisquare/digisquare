<div role="main">
	<div class="page-header">
		<h1><?php echo __('Add Event'); ?></h1>
	</div>
	<div class="form">
		<?php echo $this->Form->create('Event', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array(
					'class' => 'col col-md-3 control-label'
				),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			),
			'class' => 'well form-horizontal'
		)); ?>
			<?php echo $this->Form->input('edition_id', array(
				'empty' => true, 'class' => 'form-control chzn-select', 'required' => false
			)); ?>
			<?php echo $this->Form->input('place_id', array(
				'empty' => true, 'class' => 'form-control chzn-select', 'required' => false
			)); ?>
			<?php echo $this->Form->input('Organization', array(
				'empty' => true, 'class' => 'form-control chzn-select', 'required' => false
			)); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-2">
					<?php echo $this->Form->input('Place.name', array('required' => false)); ?>
					<?php echo $this->Form->input('Place.address'); ?>
					<?php echo $this->Form->input('Place.zipcode'); ?>
					<?php echo $this->Form->input('Place.city'); ?>
					<?php echo $this->Form->input('Place.country_code'); ?>
					<?php echo $this->Form->input('Place.latitude'); ?>
					<?php echo $this->Form->input('Place.longitude'); ?>
				</div>
			</div>
			<?php echo $this->Form->input('name'); ?>
			<?php echo $this->Form->input('uid'); ?>
			<?php echo $this->Form->input('description'); ?>
			<?php echo $this->Form->hidden('start_at', array('type' => 'text')); ?>
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
			<?php echo $this->Form->hidden('end_at', array('type' => 'text')); ?>
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
			<?php echo $this->Form->input('Tag'); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit('Save changes', array(
						'class' => 'btn btn-primary'
					)); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>