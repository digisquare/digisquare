<?php 
	$start_at = strtotime($event['Event']['start_at']);
?>
<div role="main">
	<div class="page-header">
		<h1><?php echo h($event['Event']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<h4>Date</h4>
					<ul>
						<li><?php echo 'du ' . strftime('%A %e %B %Y, %R', $start_at); ?></li>
						<li><?php echo 'au ' . strftime('%A %e %B %Y, %R', strtotime($event['Event']['end_at'])); ?></li>
					</ul>
					<h4>Lieu</h4>
					<ul>
						<li><?php echo $event['Venue']['name']; ?></li>
					</ul>
					<h4>Organisateurs</h4>
					<?php if (!empty($event['Organization'])): ?>
						<?php $organizers = ''; ?>
						<ul>
							<?php foreach ($event['Organization'] as $organizer): ?>
								<?php if (!empty($organizer['Contacts']['twitter'])): ?>
									<li>@<?php echo $organizer['Contacts']['twitter']; ?></li>
									<?php $organizers .= '@' . $organizer['Contacts']['twitter']; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<h4>Description</h4>
					<?php echo nl2br($this->Text->autoLink($event['Event']['description'])); ?>
					<?php $description_for_layout = $event['Event']['description']; ?>
					<?php $this->set(compact('description_for_layout')); ?>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<?php echo $this->Form->create('Tweet'); ?>
			<div id="buffer">
				<div style="display:none;">
					<?php for ($i=0; $i < 3; $i++) { 
						echo $this->Form->input($i . '.scheduled_at');
						echo $this->Form->input($i . '.text');
					}
					echo $this->Form->submit('Save changes'); ?>
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<?php $time = 'à ' . trim(strftime('%k', $start_at)) . 'h';
if (strftime('%M', $start_at) !== '00') {
	$time .= strftime('%M', $start_at);
}
if (strftime('%k', $start_at) <= '12') {
	$dday = 'Demain matin';
	$minutes = rand(10, 59);
	$tweet_2 = date('Y-m-d\T16:' . $minutes . ':00O', $start_at - 6*24*60*60);
	$tweet_3 = date('Y-m-d\T18:' . $minutes . ':00O', $start_at - 24*60*60);
} else {
	$dday = 'Ce soir';
	$minutes = rand(10, 59);
	$tweet_2 = date('Y-m-d\T16:' . $minutes . ':00O', $start_at - 6*24*60*60);
	$tweet_3 = date('Y-m-d\T10:' . $minutes . ':00O', $start_at);
} ?>
<?php echo $this->Html->scriptBlock('
	var bufferEvent = {
      weekday: "' . ucfirst(strftime('%A', $start_at)) . ' ",
      daymonth: "' . trim(strftime('%e %B', $start_at)) . ' ",
      title: "' . $event['Event']['name'] . ' ",
      url: "' . $this->Link->eventUrl($event, ['full' => true]) . ' ",
      time: "' . $time . ' ",
      venue: "' . $event['Venue']['name'] . ' ",
      orgas: "par ' . $organizers . ' ",
      dday: "' . $dday . ' ",
      tweet_2: "' . $tweet_2 . ' ",
      tweet_3: "' . $tweet_3 . ' ",
      hashtag: ""
	}
', ['inline' => false]); ?>
<?php echo $this->Html->script('buffer.min', ['inline' => false]); ?>