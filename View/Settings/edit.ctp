<?php $title_for_layout = __('My settings');
$this->set(compact('title_for_layout')); ?>
<div role="main">
	<div class="page-header">
		<h1><?php echo $title_for_layout; ?></h1>
	</div>
	<div class="form">
		<?php echo $this->Form->create('User', [
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
			<?php echo $this->Form->input('id'); ?>
			<div class="col col-md-9 col-md-offset-3">
				<h2>Abonnement</h2>
				<p>Recevez un email tous les matins ou le jour de votre choix chaque semaine
				pour être tenu au courant des nouveaux évènements sur digisquare !</p>
			</div>
			<?php echo $this->Form->input('email'); ?>
			<?php echo $this->Form->input('Setting.subscription',
				[
					'label' => __('Frequency'),
					'options' => [
						__('None'),
						'------',
						__('Daily'),
						'------',
						__('Monday'),
						__('Tuesday'),
						__('Wednesday'),
						__('Thursday'),
						__('Friday'),
						__('Saturday'),
						__('Sunday')
					]
				]
			); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit(
						__('Save'),
						['class' => 'btn btn-primary', 'div' => false]
					); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>