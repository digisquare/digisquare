<?php $title_for_layout = $venue['Venue']['name'] . ', ' . $venue['Venue']['city'];
$description_for_layout = $venue['Venue']['address'] . ', ' . $venue['Venue']['zipcode'] . ' ' . $venue['Venue']['city'];
$this->set(compact('title_for_layout', 'description_for_layout')); ?>
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
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-12">
					<?php echo $this->element(
						'../Venues/Elements/card',
						['venue' => $venue]
					); ?>
				</div>
				<?php echo $this->element('../Events/Elements/upcoming'); ?>
			</div>
		</div>
	</div>
</div>