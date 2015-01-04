<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?php echo $this->Html->link(
				$event['Event']['name'],
				['controller' => 'events', 'action' => 'view', 'id' => $event['Event']['id']]
			); ?>
		</h3>
	</div>
	<div class="panel-body">
		<span class="glyphicon glyphicon-time"></span>
		<?php echo strftime('%A %e %B %Y, %R', strtotime($event['Event']['start_at'])); ?><br>
		<span class="glyphicon glyphicon-map-marker"></span>
		<?php echo $event['Place']['name']; ?>
	</div>
</div>