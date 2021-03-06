<div role="main">
	<div class="page-header">
		<h1><?php echo __('Import User'); ?></h1>
	</div>
	<div class="form">
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
			<?php echo $this->Form->input(
				'User.Contacts.twitter',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;">@</div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
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
