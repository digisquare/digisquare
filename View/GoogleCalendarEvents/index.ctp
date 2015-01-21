<div role="main">
	<?php if (isset($calendars)): ?>
		<div class="page-header">
			<h1><?php echo __('Choose a calendar'); ?></h1>
		</div>
		<div class="row">
			<?php foreach ($calendars as $calendar): ?>
				<div class="col-md-3 list-widget">
					<div class="list-head">
						<h3>
							<?php echo $this->Html->link(
								$calendar->summary,
								array('?' => array('calendar_id' => $calendar->id))
							); ?>
						</h3>
						<div class="list-meta">
							<?php echo $calendar->timeZone; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="page-header">
			<h1><?php echo __('Google Calendar Events'); ?></h1>
		</div>
		<?php foreach ($events as $event): ?>
			<div class="col-md-3 list-widget">
				<div class="list-head">
					<h3>
						<?php echo $event['Event']['name']; ?>
					</h3>
					<div class="list-meta">
						<span class="glyphicon glyphicon-time"></span>
						<?php echo strftime('%A %e %B %Y, %R', strtotime($event['Event']['start_at'])); ?><br />
						<?php echo $event['Event']['location']; ?>
					</div>
					<?php echo $this->Form->create('Event', array(
						'url' => array('controller' => 'events', 'action' => 'add'),
						'type' => 'get'
					)); ?>
						<?php $this->request->data = $event; ?>
						<?php echo $this->Form->hidden('Event[name]', ['value' => $event['Event']['name']]); ?>
						<?php echo $this->Form->hidden('Event[uid]', ['value' => $event['Event']['uid']]); ?>
						<?php echo $this->Form->hidden('Venue[name]', ['value' => $event['Event']['location']]); ?>
						<?php echo $this->Form->hidden('Event[description]', ['value' => $event['Event']['description']]); ?>
						<?php echo $this->Form->hidden('Event[start_at]', array(
							'value' => date(
								'Y-m-d H:i:s', strtotime($event['Event']['start_at'])
							)
						)); ?>
						<?php echo $this->Form->hidden('Event[end_at]', array(
							'value' => date(
								'Y-m-d H:i:s', strtotime($event['Event']['end_at'])
							)
						)); ?>
						<?php echo $this->Form->hidden('Event[status]', ['value' => $event['Event']['status']]); ?>
						<?php echo $this->Form->hidden('Event[url]', ['value' => $event['Event']['url']]); ?>
						<?php echo $this->Form->submit('Import', array(
							'class' => 'btn btn-primary'
						)); ?>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>