<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div id="datetime" class="row">
				<!-- Thanks to @craigbuckler: http://www.sitepoint.com/create-calendar-icon-html5-css3/ -->
				<?php 
				$start_at = strtotime($event['Event']['start_at']);
				$end_at = strtotime($event['Event']['end_at']);
				$sameday = (date('Y-m-d', $start_at) === date('Y-m-d', $end_at));
				$allday = ('00:00:00' === date('H:i:s', $start_at) && '00:00:00' === date('H:i:s', $end_at));
				if ($sameday) {
					$class = ($allday ? 'col-md-12' : 'col-xs-6 col-sm-7 col-md-5');
				} else {
					$class = 'col-xs-6';
				} ?>
				<div class="<?php echo $class; ?>">
					<?php if (!$sameday): ?>
						<div class="text-center">du</div>
					<?php endif; ?>
					<time datetime="<?php echo date('c', $start_at); ?>" class="icon">
						<em><?php echo ucwords(strftime('%B', $start_at)); ?></em>
						<strong><?php echo ucwords(strftime('%A', $start_at)); ?></strong>
						<span><?php echo strftime('%e', $start_at); ?></span>
					</time>
					<?php if (!$sameday && !$allday): ?>
						<div class="time text-center">
							<?php echo date('H', $start_at); ?>h
							<?php echo ('00' === date('i', $start_at) ? '' : date('i', $start_at)); ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if (!$sameday): ?>
					<div class="<?php echo $class; ?>">
						<div class="text-center">au</div>
						<time datetime="<?php echo date('c', $end_at); ?>" class="icon">
							<em><?php echo ucwords(strftime('%B', $end_at)); ?></em>
							<strong><?php echo ucwords(strftime('%A', $end_at)); ?></strong>
							<span><?php echo strftime('%e', $end_at); ?></span>
						</time>
						<?php if (!$allday): ?>
							<div class="time text-center">
								<?php echo date('H', $end_at); ?>h
								<?php echo ('00' === date('i', $end_at) ? '' : date('i', $end_at)); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php elseif ($sameday && !$allday): ?>
					<div class="col-xs-4 col-sm-2 col-md-6">
						<div class="time text-left">
							de <span><?php echo date('H', $start_at); ?>h</span>
							<?php echo ('00' === date('i', $start_at) ? '' : date('i', $start_at)); ?>
						</div>
						<div class="time text-right">
							à <span><?php echo date('H', $end_at); ?>h</span>
							<?php echo ('00' === date('i', $end_at) ? '' : date('i', $end_at)); ?>
						</div>
					</div>
				<?php endif;  ?>
			</div>
		</div>
		<?php $title_for_layout = $event['Event']['name'] . ' - ';
		if ($sameday) {
			$title_for_layout .= ucwords(strftime('%A %e %B', $start_at));
		} else {
			$title_for_layout .= 'Du ' . strtolower(strftime('%A %e %B', $start_at))
				. ' au ' . strtolower(strftime('%A %e %B', $end_at));
		}
		if (isset($event['Place']) && !empty($event['Place'])) {
			$title_for_layout .= ' - ' . $event['Place']['name'] . ', ' . $event['Place']['city'];
		}
		$this->set(compact('title_for_layout')); ?>
		<div class="panel-footer">
			<?php echo $this->Html->link(
				'<span class="fa-stack fa-lg">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
				</span>',
				['controller' => 'events', 'action' => 'view', 'id' => $event['Event']['id'], 'ext' => 'ics'],
				['escape' => false, 'title' => 'Exporter au format ics']
			); ?>
			<?php echo $this->element('../Events/Elements/google-cal-url', ['event' => $event]); ?>
			<?php echo $this->element('../Events/Elements/yahoo-cal-url', ['event' => $event]); ?>
			<?php echo $this->element('../Events/Elements/outlook-cal-url', ['event' => $event]); ?>
		</div>
	</div>
</div>