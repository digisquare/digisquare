<div role="main">
	<div class="page-header">
		<?php if (1 == $this->Session->read('Auth.User.group_id')): ?>
			<?php echo $this->Html->link(
				'<i class="icon-plus-sign icon-white"></i> ' . __('Buffer'),
				array('controller' => 'events', 'action' => 'buffer', 'id' => $event['Event']['id']),
				array('escape' => false, 'class' => 'btn btn-primary pull-right')
			); ?>
		<?php endif; ?>
		<h1><?php echo h($event['Event']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo nl2br($this->Text->autoLink($event['Event']['description'], ['escape' => false])); ?>
					<?php $description_for_layout = $event['Event']['description']; ?>
					<?php $this->set(compact('description_for_layout')); ?>
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
					<?php if (!empty($organizer['avatar'])) {
						echo $this->Html->meta(
							['property' => 'og:image', 'content' => $organizer['avatar']],
							null,
							['inline' => false]
						);
					} ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-12">
					<?php echo $this->element('../Campaigns/Elements/subscribe'); ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-12">
					<?php echo $this->element('../Events/Elements/time', ['venue' => $event]); ?>
				</div>
				<?php if ($event['Event']['venue_id']): ?>
					<div class="col-xs-12 col-sm-6 col-md-12">
						<?php echo $this->element('../Venues/Elements/card', ['venue' => $event]); ?>
					</div>
				<?php endif; ?>
				<?php echo $this->element('../Events/Elements/upcoming', ['except' => $event]); ?>
			</div>
		</div>
	</div>
</div>