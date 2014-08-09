<div role="main">
	<div class="startups form">
		<h1><?php echo __('Edit Place'); ?></h1>
		<?php echo $this->Form->create('Place', array(
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
				echo $this->Form->input('name');
				echo $this->Form->input('address');
				echo $this->Form->input('zipcode');
				echo $this->Form->input('city');
				echo $this->Form->input('country_code');
				echo $this->Form->input('latitude');
				echo $this->Form->input('longitude');
			?>
			<a onclick="toggle_visibility('mapIframe');">Coordonnées GPS Manuelles</a>
			<iframe id="mapIframe" style="display:none;" src="http://www.mapcoordinates.net/fr" width="100%" height="600px"></iframe>
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