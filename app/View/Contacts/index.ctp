<div role="main">
	<div class="page-header">
		<h1>Formulaire de contact</h1>
	</div> 
	<?php echo $this->Form->create('Contact', array(
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

		<?php echo $this->Form->input('first_name'); ?>
		<?php echo $this->Form->input('last_name'); ?>
		<?php echo $this->Form->input('email'); ?>
		<?php echo $this->Form->input('message'); ?>

		<div class="form-group">
			<div class="col col-md-9 col-md-offset-3">
				<?php echo $this->Form->submit(__('Send'), array(
					'class' => 'btn btn-primary'
				)); ?>
			</div>
		</div>
	<?php echo $this->Form->end(); ?>
</div>