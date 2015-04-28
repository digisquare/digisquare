<?php if (!$this->Session->read('Subscribed')): ?>
	<div class="panel panel-default">
		<div class="panel-header alert alert-success" style="margin:0;border-radius:0;border:none;">
			<strong>Nouveau !</strong> Recevez les évènements à venir directement dans votre boite mail :
		</div>
		<div class="panel-body alert-success">
			<?php echo $this->Form->create('Campaign', [
				'action' => 'subscribe',
				'class' => 'form-horizontal'
			]); ?>
				<div class="form-group">
					<div class="col col-md-12">
						<?php echo $this->Form->input('email', [
							'placeholder' => strtolower($this->Session->read('Edition.name')) . '@digisquare.net',
							'label' => false,
							'div' => false,
							'class' => 'form-control',
							'required' => true
						]); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<?php echo $this->Form->submit('Inscription', [
							'class' => 'btn btn-primary pull-right',
							'div' => false
						]); ?>
					</div>
				</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
<?php endif; ?>