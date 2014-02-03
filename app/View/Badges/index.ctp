<div class="badges index">
	<h1><?php echo __('Badges'); ?></h1>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-unlisted">
		<li><?php echo $this->Html->link(__('New Badge'), array('action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?></li>
	</ul>
</div>
