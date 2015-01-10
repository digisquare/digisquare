<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">
			<?php if (!empty($event['Organization'])) {
				foreach ($event['Organization'] as $organizer) {
					echo $this->Link->viewOrganization(
						$this->Html->image(
							$organizer['avatar'],
							[
								'height' => 20,
								'alt' => $organizer['name'],
								'style' => ['margin-right:10px;']
							]
						),
						[
							'Organization' => $organizer,
							'Edition' => $event['Edition']
						],
						['escapeTitle' => false]
					);
				}
			} ?>
			<?php echo $this->Link->viewEvent($event); ?>
		</h1>
	</div>
	<div class="panel-body">
		<span class="glyphicon glyphicon-time"></span>
		<?php echo strftime('%A %e %B %Y, %R', strtotime($event['Event']['start_at'])); ?><br>
		<span class="glyphicon glyphicon-map-marker"></span>
		<?php echo $this->Link->viewPlace($event); ?>
	</div>
</div>