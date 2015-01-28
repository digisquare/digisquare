<div role="main">
	<div class="page-header">
		<h1><?php echo __('Import Event'); ?></h1>
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
			<?php echo $this->Form->input('edition_id',
				[
					'empty' => true,
					'class' => 'form-control chzn-select',
					'required' => false,
					'default' => $this->Session->read('Edition.id')
				]
			); ?>
			<?php echo $this->Form->input('url', ['required' => true]); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit('Import', array(
						'class' => 'btn btn-primary'
					)); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
