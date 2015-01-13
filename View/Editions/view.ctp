<?php 
$today = new DateTime('today');
$url = [
	'controller' => 'events',
	'action' => 'index',
	'?' => [
		'date' => $today->format('Y-m'),
		'sort' => 'start_at',
		'direction' => 'asc',
		'limit' => 100
	]
];
$events = $this->requestAction($url);
?>
<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $edition['Edition']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $edition['Edition']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $edition['Edition']['id'])
		); ?>
		<h1><?php echo h($edition['Edition']['name']); ?></h1>
	</div>
	<div class="hidden-xs row">
		<div class="col-md-12">
			<?php echo $this->element(
				'../Events/Elements/monthly',
				['events' => $events]
			); ?>
		</div>
	</div>
	<div class="visible-xs-block row row-flex row-flex-wrap">
		<?php foreach ($events as $event): ?>
			<div class="col-xs-12 col-sm-6">
				<?php echo $this->element(
					'../Events/Elements/card',
					['event' => $event]
				); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>