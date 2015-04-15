<?php $title_for_layout = __('My profile');
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
			<?php echo $this->Form->input('username'); ?>
			<?php echo $this->Form->input('email'); ?>
			<?php if (1 == $this->Session->read('Auth.User.group_id')) {
				echo $this->Form->input('group_id');
			} ?>
			<?php echo $this->Form->input('User.Informations.first_name'); ?>
			<?php echo $this->Form->input('User.Informations.last_name'); ?>
			<?php echo $this->Form->input('User.Informations.description', ['type' => 'textarea']); ?>
			<?php if (!(empty($this->data['User']['avatar']))) {
				$avatar = $this->Html->image(
					$this->data['User']['avatar'],
					['height' => 20]
				);
			} else {
				$avatar = '<i class="fa fa-link"></i>';
			} ?>
			<?php echo $this->Form->input('avatar',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;">' . $avatar . '</div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input('User.Contacts.twitter',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;">@</div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input('User.Contacts.facebook',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;">/</div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<?php echo $this->Form->input('User.Contacts.website',
				[
					'between' => '<div class="col col-md-9"><div class="input-group" style="width:100%;">'
						. '<div class="input-group-addon" style="width:45px;"><i class="fa fa-link"></i></div>',
					'after' => '</div></div>',
					'wrapInput' => false
				]
			); ?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit(
						__('Save'),
						['class' => 'btn btn-primary', 'div' => false]
					); ?>
					<?php echo $this->Html->link(
						__('Twitter'),
						[
							'action' => 'edit',
							'id' => $this->data['User']['id'],
							'?' => ['twitter' => 1]
						],
						['class' => 'btn btn-default']
					); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>