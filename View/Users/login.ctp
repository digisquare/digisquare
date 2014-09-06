<div role="main">
	<div class="users form">
		<h1><?php echo __('Login'); ?></h1>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array(
					'class' => 'col col-md-3 control-label'
				),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			),
			'class' => 'well form-horizontal col col-md-5'
		)); ?>
			<?php echo $this->Form->input('username'); ?>
			<?php echo $this->Form->input('password'); ?>
			<div class="form-group">
				<div class="col col-md-3 col-md-offset-3">
					<?php echo $this->Form->submit('Login', array(
						'class' => 'btn btn-primary'
					)); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="well col col-md-6 col-md-offset-1">
		<?php $providers = array('facebook', 'twitter', 'meetup', 'google'); ?>
		<ul>
			<?php foreach ($providers as $provider): ?>
				<li>
					<?php echo $this->Html->link(
						__('%s Connect', ucfirst($provider)),
						array(
							'plugin' => 'Opauth',
							'controller' => 'opauth',
							'action' => 'index',
							$provider
						)
					); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>