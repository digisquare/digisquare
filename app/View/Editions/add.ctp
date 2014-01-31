<div role="main">
	<div class="editions form">
	<h3><?php echo __('Add Editions'); ?></h3>
	<?php echo $this->Form->create('Edition', array('class' => 'form-horizontal')); ?>
		<div class="form-group col-sm-12">
		<?php
			echo $this->Form->input('name', array('class' => 'form-control'));
		?>
		</div>
		<?php 
			echo $this->Form->submit('Submit', array('class' => 'btn btn-default'));
			echo $this->Form->end(); 
		?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-unstyled">
			<li><?php echo $this->Html->link(__('List Editions'), array('action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?></li>
			<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('List Startups'), array('controller' => 'startups', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
			<li><?php echo $this->Html->link(__('New Startup'), array('controller' => 'startups', 'action' => 'add'), array('class' => 'btn btn-primary btn-xs')); ?> </li>
		</ul>
	</div>
</div>