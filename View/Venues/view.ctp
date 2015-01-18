<?php $title_for_layout = $venue['Venue']['name'] . ', ' . $venue['Venue']['city'];
$this->set(compact('title_for_layout')); ?>
<div role="main">
	<div class="page-header">
		<h1><?php echo h($venue['Venue']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php echo $this->element(
				'../Events/Elements/list',
				['venue' => $venue]
			); ?>
		</div>
		<div class="col-md-4">
			<?php echo $this->element(
				'../Venues/Elements/card',
				['venue' => $venue]
			); ?>
		</div>
	</div>
</div>