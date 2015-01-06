<div role="main">
	<div class="page-header">
		<h1><?php echo __('Add Organization'); ?></h1>
	</div>
	<div class="form">
		<?php echo $this->Form->create(
			'Organization',
			[
				'inputDefaults' => [
					'div' => 'form-group',
					'label' => [
						'class' => 'col col-md-3 control-label'
					],
					'wrapInput' => 'col col-md-9',
					'class' => 'form-control'
				],
				'class' => 'well form-horizontal'
			]
		); ?>
			<?php echo $this->Form->input('edition_id',
				['empty' => true, 'class' => 'form-control chzn-select', 'required' => false]
			); ?>
			<?php echo $this->Form->input('place_id',
				['empty' => true, 'class' => 'form-control chzn-select-deselect', 'required' => false]
			); ?>
			<?php echo $this->Form->input('name'); ?>
			<?php echo $this->Form->input('description'); ?>
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