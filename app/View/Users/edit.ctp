<div role="main">
	<div class="users form">
		<h1><?php echo __('Edit User'); ?></h1>
		<?php echo $this->Form->create('User', array(
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
			<?php 
				echo $this->Form->input('id'); 
				echo $this->Form->input('username');
				echo $this->Form->input('password');
				echo $this->Form->input('email');
			?>
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