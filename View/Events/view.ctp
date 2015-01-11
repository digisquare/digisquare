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
				<?php $first = true; ?>
				<h2><?php echo __n('Organizer:', 'Organizers:', sizeof($event['Organization'])) ?></h2>
				<?php foreach ($event['Organization'] as $organizer): ?>
					<?php echo $this->element(
						'../Organizations/Elements/card',
						[
							'organization' => [
								'Organization' => $organizer,
								'Edition' => $event['Edition']
							],
							'truncate' => true
						]
					); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<div class="row">
			<?php echo $this->element('../Events/Elements/time', ['place' => $event]); ?>
			<?php echo $this->element('../Places/Elements/card', ['place' => $event]); ?>
			</div>
		</div>
	</div>
</div>