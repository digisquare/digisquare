<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">
			<?php echo $this->Link->viewEvent($event); ?>
		</h1>
	</div>
	<div class="panel-body">
		<span class="glyphicon glyphicon-time"></span>
		<?php echo strftime('%A %e %B %Y, %R', strtotime($event['Event']['start_at'])); ?><br>
		<span class="glyphicon glyphicon-map-marker"></span>
		<?php echo $event['Place']['name']; ?>
	</div>
</div>