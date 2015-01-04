<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $event['Event']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $event['Event']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $event['Event']['id'])
		); ?>
		<h1><?php echo h($event['Event']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo nl2br($this->Text->autoLink($event['Event']['description'])); ?>
				</div>
				<div class="panel-footer">
					Source : <?php echo $this->Html->link(
						'<span class="glyphicon glyphicon-link"></span>',
						$event['Event']['url'],
						['target' => '_blank', 'escape' => false]
					); ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="datetime" class="row">
						<div class="col-xs-6 col-sm-7 col-md-5">
							<?php $start_at = strtotime($event['Event']['start_at']); ?>
							<!-- Thanks to @craigbuckler: http://www.sitepoint.com/create-calendar-icon-html5-css3/ -->
							<time datetime="<?php echo date('c', $start_at); ?>" class="icon">
								<em><?php echo ucwords(strftime('%A', $start_at)); ?></em>
								<strong><?php echo ucwords(strftime('%B', $start_at)); ?></strong>
								<span><?php echo strftime('%e', $start_at); ?></span>
							</time>
						</div>
						<div class="col-xs-4 col-sm-2 col-md-6">
							<div class="from">de <span>19h</div>
							<div  class="to">à <span>22h</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					Exporter :
					<?php
						$start = new DateTime($event['Event']['start_at']);
						$end = new DateTime($event['Event']['end_at']);
						$interval = $end->diff($start);
					?>
					<?php echo $this->Html->link(
						'<span class="glyphicon glyphicon-align-left"></span>',
						'http://www.google.com/calendar/event?action=TEMPLATE'
							. '&text=' . urlencode($event['Event']['name'])
							. '&dates=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['start_at']))
							. '/' . gmdate("Ymd\THis\Z", strtotime($event['Event']['end_at']))
							. '&details=' . urlencode($event['Event']['description'])
							. '&location=' . urlencode($event['Place']['oneliner'])
						, 
						['target' => '_blank', 'escape' => false, 'title' => __('Export to Google Calendar')]
					); ?> 
					<?php echo $this->Html->link(
						'<span class="glyphicon glyphicon-align-center"></span>',
						'http://calendar.yahoo.com/?v=60&VIEW=d&type=20'
							. '&in_loc=' . urlencode($event['Place']['oneliner'])
							. '&TITLE=' . urlencode($event['Event']['name'])
							. '&ST=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['start_at']))
							. '&DUR=' . $interval->format('%H%I')
							. '&DESC=' . urlencode($event['Event']['description'])
						,
						['target' => '_blank', 'escape' => false, 'title' => __('Export to Yahoo Calendar')]
					); ?> 
					<?php echo $this->Html->link(
						'<span class="glyphicon glyphicon-align-right"></span>',
						'http://calendar.live.com/calendar/calendar.aspx?rru=addevent'
							. '&dtstart=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['start_at']))
							. '&dtend=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['end_at']))
							. '&summary=' . urlencode($event['Event']['name'])
							. '&location=' . urlencode($event['Place']['oneliner'])
							. '&description=' . urlencode($event['Event']['description'])
						,
						['target' => '_blank', 'escape' => false, 'title' => __('Export to Outlook Calendar')]
					); ?> 
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=<?php echo Configure::read('GoogleMapsBrowserKey'); ?>&q=<?php echo urlencode($event['Place']['oneliner']) ?>">
						</iframe>
					</div>
				</div>
				<div class="panel-footer">
					<strong>
						<?php echo $this->Html->link(
							$event['Place']['name'], 
							['controller' => 'places', 'action' => 'view', 'id' => $event['Place']['id']]
						); ?>
					</strong><br>
					<?php echo h($event['Place']['address']); ?><br>
					<?php echo h($event['Place']['zipcode'] . ' ' . $event['Place']['city']); ?><br>
				</div>
			</div>
		</div>
	</div>
</div>