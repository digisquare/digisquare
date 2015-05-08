<?php
$date = new DateTime();
$edition['Edition'] = $this->Session->read('Edition');
$url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'sort' => 'start_at',
		'direction' => 'asc',
		'end_at' => $date->format('Y-m-d 00:00:00'),
		'edition_id' => $edition['Edition']['id'],
	]
];
$events = $this->requestAction($url);
$event_count = 0;
if (!empty($events)): ?>
	<div class="col-xs-12 col-sm-6 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">
					Plus d'évènements à venir :
				</h1>
			</div>
			<div class="panel-body">
				<?php foreach ($events as $event): ?>
					<?php if (isset($event['Organization'][0])
						&& !empty($event['Organization'][0]['avatar'])
						&& (!isset($except['Event']['id']) || $event['Event']['id'] !== $except['Event']['id'])
					): ?>
						<?php $event_count++; ?>
						<div class="media">
							<div class="media-left">
								<?php echo $this->Link->viewOrganization(
									$this->Html->image(
										$event['Organization'][0]['avatar'],
										[
											'height' => 40,
											'alt' => $event['Organization'][0]['name'],
											'style' => ['margin-right:10px;']
										]
									),
									[
										'Organization' => $event['Organization'][0],
										'Edition' => $event['Edition']
									],
									['escapeTitle' => false]
								); ?>
							</div>
							<div class="media-body">
								<?php echo $this->Link->viewEvent($event); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($event_count >= 4) {
						break;
					} ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>