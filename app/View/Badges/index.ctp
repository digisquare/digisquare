<div class="badges index">
	<div class="page-header">
		<h1><?php echo __('Badges');?></h1>
	</div>
	<div class="row">
		<?php foreach ($badges as $badge): ?>
			<a class="thumbnail col-md-2 <?php echo h($badge['Badge']['class_badged']); ?>" rel="tooltip" data-toggle="hover" title="<?php echo h($badge['Badge']['description']); ?>">
		      <img src="../img/badges/<?php echo h($badge['Badge']['icon']); ?>" alt="..." >
		    </a>
	<?php endforeach; ?>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  

<script>  
$(function ()  
{ $(".thumbnail").tooltip();  
});  
</script>