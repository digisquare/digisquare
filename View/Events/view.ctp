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
					<?php echo $this->Html->link(
						'<span class="fa-stack fa-lg">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-link fa-stack-1x fa-inverse"></i>
						</span>',
						$event['Event']['url'],
						['target' => '_blank', 'escape' => false, 'title' => 'Source']
					); ?>
				</div>
			</div>
			<?php if (!empty($event['Organization'])): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">
							<?php echo __n('Organizer:', 'Organizers:', sizeof($event['Organization'])) ?>
						</h1>
					</div>
					<div class="panel-body">
						<?php foreach ($event['Organization'] as $organizer): ?>
							<h4><?php echo $this->Html->link($organizer['name'],
									['controller' => 'organizations', 'action' => 'view', 'id' => $organizer['id']]
							); ?></h4>
							<div><?php echo $organizer['description']; ?></div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="datetime" class="row">
						<div class="col-xs-6 col-sm-7 col-md-5">
							<?php $start_at = strtotime($event['Event']['start_at']); ?>
							<!-- Thanks to @craigbuckler: http://www.sitepoint.com/create-calendar-icon-html5-css3/ -->
							<time datetime="<?php echo date('c', $start_at); ?>" class="icon">
								<em><?php echo ucwords(strftime('%B', $start_at)); ?></em>
								<strong><?php echo ucwords(strftime('%A', $start_at)); ?></strong>
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
			<?php echo $this->element('../Places/Elements/card', ['place' => $event]); ?>
		</div>
	</div>
</div>