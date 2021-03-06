<?php
$today = $query_date = new DateTime('today');
if (isset($this->request->query['date']) && date('Y-m') !== $this->request->query['date']) {
	$query_date = new Datetime($this->request->query['date']);
	$query_month = $query_date->format('m');
	if ($query_date == new Datetime('first monday of' . $query_date->format('F Y'))) {
		$first_monday = $query_date;
	} else {
		$query_date->modify('-1 month');
		$first_monday = new Datetime('last monday of' . $query_date->format('F Y'));
		$query_date->modify('+1 month');
	}
	$last_day_of_this_month = new Datetime('last day of' . $query_date->format('F Y'));
	$day = $first_monday;
} else {
	if ($today == new Datetime('midnight first day of this month')) {
		$first_monday = clone $today;
	} else {
		$first_monday = new Datetime('last monday of last month');
	}
	$last_day_of_this_month = new Datetime('last day of this month');
	$day = $first_monday;
}
?>
<table id="monthly-calendar" class="table table-bordered">
	<tr>
		<th>Lundi</th>
		<th>Mardi</th>
		<th>Mercredi</th>
		<th>Jeudi</th>
		<th>Vendredi</th>
		<th>Samedi</th>
		<th>Dimanche</th>
	</tr>
	<?php while ($day < $last_day_of_this_month): ?>
		<tr>
			<?php for ($day_in_week = 1; $day_in_week < 8; $day_in_week++): ?>
				<?php
				$row = 1;
				$class = 'day-cell';
				$class .= ($day->format('m') === $query_date->format('m') ? ' cal-day-in-month' : ' cal-day-outmonth');
				$class .= (in_array($day->format('N'), [6, 7]) ? ' cal-day-weekend' : '');
				$class .= ($day == $today ? ' cal-day-today' : '');
				?>
				<td class="<?php echo $class; ?>">
					<table class="day-table">
						<tr>
							<th class="day-number"><?php echo $day->format('j'); ?></th>
						</tr>
						<?php foreach ($events as $key => $event): ?>
							<?php $start_at = new Datetime($event['Event']['start_at']); ?>
							<?php if ($day->format('Y-m-d') === $start_at->format('Y-m-d')): ?>
								<?php
								$end_at = new Datetime($event['Event']['end_at']);
								$sameday = ($start_at->format('Y-m-d') === $end_at->format('Y-m-d'));
								$allday = ('00:00:00' === $start_at->format('H:i:s'));
								$title = '';
								if (!empty($event['Organization'])) {
									foreach ($event['Organization'] as $organizer) {
										if (!empty($organizer['avatar'])) {
											$title .= $this->Html->image(
												$organizer['avatar'],
												[
													'height' => 20,
													'alt' => $organizer['name'],
													'style' => ['margin-right:10px;']
												]
											);
										}
									}
								}
								$title .= $event['Event']['name'];
								$description = explode('. ', strip_tags($event['Event']['description']));
								$content = $this->Text->truncate($description[0], 140);
								if (!empty($event['Venue']['name'])) {
									$content .= '<br><span class="glyphicon glyphicon-map-marker"></span> ';
									$content .= $event['Venue']['name'];
								} ?>
								<tr>
									<td>
										<?php if (!$allday): ?>
											<span class="event-time">
												<?php echo $start_at->format('H:i'); ?>
											</span>
										<?php endif; ?>
										<span class="event-name" data-toggle="popover"
										 title="<?php echo htmlspecialchars($title); ?>"
										 data-content="<?php echo htmlspecialchars($content); ?>">
											<?php echo $this->Link->viewEvent($event); ?>
										</span>
									</td>
								</tr>
								<?php if ($end_at->format('Y-m-d') > $day->format('Y-m-d')) {
									$start_at->modify('+1 day');
									$events[$key]['Event']['start_at'] = $start_at->format('Y-m-d');
								} else {
									unset($events[$key]);
								} ?>
								<?php $row++; ?>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php while($row < 6): ?>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<?php $row++; ?>
						<?php endwhile; ?>
					</table>
				</td>
				<?php $day->modify('+1 day'); ?>
			<?php endfor; ?>
		</td>
	<?php endwhile; ?>
</table>
