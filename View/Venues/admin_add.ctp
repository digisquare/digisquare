<div role="main">
	<div class="page-header">
		<h1><?php echo __('Add Venue'); ?></h1>
	</div>
	<div class="form">
		<?php echo $this->Form->create('Venue', [
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
			<?php echo $this->Form->input(
				'edition_id',
				[
					'empty' => true,
					'class' => 'form-control chzn-select',
					'required' => false,
					'default' => $this->Session->read('Edition.id')
				]
			); ?>
			<?php echo $this->Form->input('address'); ?>
			<?php echo $this->Form->input('zipcode'); ?>
			<?php echo $this->Form->input('city'); ?>
			<?php echo $this->Form->input('country_code'); ?>
			<?php echo $this->Form->input('latitude'); ?>
			<?php echo $this->Form->input('longitude'); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit('Save changes', [
						'class' => 'btn btn-primary'
					]); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>