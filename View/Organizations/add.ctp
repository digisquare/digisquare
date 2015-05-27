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
			<?php echo $this->Form->input(
				'type',
				[
					'empty' => true,
					'class' => 'form-control chzn-select',
					'required' => false,
					'default' => 0,
					'options' => [
						0 => 'Organization',
						1 => 'Startup',
						2 => 'Other'
					]
				]
			); ?>
			<?php echo $this->Form->input(
				'venue_id',
				[
					'empty' => true,
					'class' => 'form-control chzn-select-deselect',
					'required' => false
				]
			); ?>
			<?php echo $this->Form->input('avatar',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;"><i class="fa fa-link"></i></div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input(
				'Organization.Contacts.twitter',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;">@</div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input(
				'Organization.Contacts.facebook',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;">/</div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input(
				'Organization.Contacts.website',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;"><i class="fa fa-link"></i></div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input(
				'Organization.Contacts.societe',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;"><i class="fa fa-link"></i></div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input('description'); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit(
						'Save changes',
						['class' => 'btn btn-primary', 'div' => false]
					); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>