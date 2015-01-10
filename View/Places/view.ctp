<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			array('action' => 'edit', 'id' => $place['Place']['id']),
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			array('action' => 'delete', 'id' => $place['Place']['id']), 
			array('escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'),
			__('Are you sure you want to delete # %s?', $place['Place']['id'])
		); ?>		
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