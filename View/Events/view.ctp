<div role="main">
	<div class="page-header">
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
				<?php $first = true; ?>
				<h2><?php echo __n('Organizer:', 'Organizers:', sizeof($event['Organization'])) ?></h2>
				<?php foreach ($event['Organization'] as $organizer): ?>
					<?php echo $this->element(
						'../Organizations/Elements/card',
						[
							'organization' => [
								'Organization' => $organizer,
								'Edition' => $event['Edition']
							]
						]
					); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-12">
					<?php echo $this->element('../Events/Elements/time', ['venue' => $event]); ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-12">
					<?php echo $this->element('../Venues/Elements/card', ['venue' => $event]); ?>
				</div>
			</div>
		</div>
	</div>
</div>