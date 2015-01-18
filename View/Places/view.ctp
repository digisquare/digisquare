<?php $title_for_layout = $place['Place']['name'] . ', ' . $place['Place']['city'];
$this->set(compact('title_for_layout')); ?>
<div role="main">
	<div class="page-header">
		<h1><?php echo h($place['Place']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php echo $this->element(
				'../Events/Elements/list',
				['place' => $place]
			); ?>
		</div>
		<div class="col-md-4">
			<?php echo $this->element(
				'../Places/Elements/card',
				['place' => $place]
			); ?>
		</div>
	</div>
</div>