<?php
$start_at = strtotime($event['Event']['start_at']);
$end_at = strtotime($event['Event']['end_at']);
$sameday = (date('Y-m-d', $start_at) === date('Y-m-d', $end_at));
$allday = ('00:00:00' === date('H:i:s', $start_at) && '00:00:00' === date('H:i:s', $end_at));
if ($sameday) {
	if ($allday) {
		$datetime = ucwords(strftime('%A %e %B', $start_at));
	} else {
		$datetime = ucwords(strftime('%A %e %B %Y, %R', $start_at));
	}
} else {
	$datetime = 'Du ' . strtolower(strftime('%A %e %B', $start_at))
		. ' au ' . strtolower(strftime('%A %e %B', $end_at));
}
?>
<div class="panel panel-default flex-col">
	<div class="panel-heading">
		<h1 class="panel-title">
			<?php if (!empty($event['Organization'])) {
				foreach ($event['Organization'] as $organizer) {
					if (!empty($organizer['avatar'])) {
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
				}
			} ?>
			<?php echo $this->Link->viewEvent($event); ?>
		</h1>
	</div>
	<div class="panel-body flex-grow">
		<div>
			<p>
				<?php $description = explode('. ', $event['Event']['description']); ?>
				<?php echo $this->Text->truncate($description[0], 140); ?>
			</p>
			<span class="glyphicon glyphicon-time"></span>
			<?php echo $datetime; ?><br>
			<span class="glyphicon glyphicon-map-marker"></span>
			<?php echo $this->Link->viewVenue($event); ?>
		</div>
	</div>
</div>