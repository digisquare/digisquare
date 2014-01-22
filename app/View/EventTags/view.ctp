<div class="eventTags view">
<h2><?php echo __('Event Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventTag['EventTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Id'); ?></dt>
		<dd>
			<?php echo h($eventTag['EventTag']['event_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag Id'); ?></dt>
		<dd>
			<?php echo h($eventTag['EventTag']['tag_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Tag'), array('action' => 'edit', $eventTag['EventTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event Tag'), array('action' => 'delete', $eventTag['EventTag']['id']), null, __('Are you sure you want to delete # %s?', $eventTag['EventTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Tag'), array('action' => 'add')); ?> </li>
	</ul>
</div>
