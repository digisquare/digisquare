<div class="badges index">
	<div class="page-header">
		<h1><?php echo __('Badges'); ?></h1>
	</div>
	<div class="row">
		<?php foreach ($badges as $badge): ?>
			<div class="thumbnail col-md-2">
		      <img src="../img/badges/<?php echo h($badge['Badge']['icon']); ?>" alt="...">
		      <div class="caption">
		        <h3><?php echo h($badge['Badge']['name']); ?></h3>
		        <p><?php echo h($badge['Badge']['description']); ?></p>
		      </div>
		    </div>
	<?php endforeach; ?>
	</div>
</div>
