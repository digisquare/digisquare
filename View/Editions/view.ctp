<?php 
$title = 'Le calendrier des évènements à ' . $this->Link->viewEdition($edition);
$this->set('title_for_layout', 'Le calendrier des évènements du numérique à ' . $edition['Edition']['name']);
$url = ['slug' => $edition['Edition']['slug']];
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
$popover_title = htmlspecialchars('S\'abonner au calendrier');
$popover_url = $this->Html->url(
	[
		'controller' => 'events',
		'action' => 'index',
		'slug' => $edition['Edition']['slug'],
		'feed' => true,
		'ext' => 'ics'
	],
	['full' => true]
);
$popover_content = htmlspecialchars('<input type="text" value="'. $popover_url . '" />');
?>
<div role="main">
	<div class="page-header">
		<a href="<?php echo $popover_url; ?>" class="btn btn-primary pull-right feed-popover" title="S'abonner au calendrier"
		 data-toggle="popover" title="<?php echo $popover_title; ?>" data-content="<?php echo $popover_content; ?>">
			<i class="fa fa-calendar"></i>
		</a>
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $edition['Edition']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right', 'style' => 'margin-right:10px;')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $edition['Edition']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $edition['Edition']['id'])
		); ?>
		<h1><?php echo $title; ?></h1>
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
	<?php echo $this->element(
		'../Events/Elements/pagination',
		['controller' => 'edition', 'edition' => $edition]
	); ?>
</div>