<div role="main">
	<div class="page-header">
		<h1><?php echo __('Add Member'); ?></h1>
	</div>
	<div class="form">
		<?php echo $this->Form->create('Member', [
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
			<?php echo $this->Form->input('organization_id', [
				'empty' => true,
				'class' => 'form-control chzn-select'
			]); ?>
			<?php echo $this->Form->input('user_id', [
				'empty' => true,
				'class' => 'form-control chzn-select'
			]); ?>
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