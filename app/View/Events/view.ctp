<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Edition']['name'], array('controller' => 'editions', 'action' => 'view', 'id' => $event['Edition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Place']['name'], array('controller' => 'places', 'action' => 'view', 'id' => $event['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($event['Event']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($event['Event']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start At'); ?></dt>
		<dd>
			<?php echo h($event['Event']['start_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End At'); ?></dt>
		<dd>
			<?php echo h($event['Event']['end_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($event['Event']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', 'id' => $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', 'id' => $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Editions'), array('controller' => 'editions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('controller' => 'editions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizers'), array('controller' => 'organizers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizer'), array('controller' => 'organizers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<?php
			//Formating event's date in order to export to Google Calendar, Yahoo Calendar and Outlook Calendar
			$startdate1 = date("Ymd", strtotime($event['Event']['start_at']));
			$startdate2 = date("His", strtotime($event['Event']['start_at']));
			$enddate1 = date("Ymd", strtotime($event['Event']['end_at']));
			$enddate2 = date("His", strtotime($event['Event']['end_at']));
			$interval = date_diff(date_create($event['Event']['start_at']), date_create($event['Event']['end_at']));
			$DURmin = $interval->format('%I');
			$DURheure = ($interval->format('%d')*24)+$interval->format('%H');
			$location = $event['Place']['name']." ".$event['Place']['address']." ".$event['Place']['zipcode']." ".$event['Place']['city']." ".$event['Place']['country_code'];
		?>
		<li>
			<?php echo $this->Html->link(__('Export to Google Calendar'), 
				('http://www.google.com/calendar/event?action=TEMPLATE
				&text='.$event['Event']['name'].'
				&dates=' . $startdate1 . 'T' . $startdate2 . '/' . $enddate1 . 'T' . $enddate2 . '
				&details=' . $event['Event']['description'] . '
				&location=' . $location . '
				&trp=false&sprop=' . $event['Event']['url'] . '
				&sprop=name:' . $event['Event']['url'] ), 
				array('class' => 'button', 'target' => '_blank')); 
			?> 
		</li>
		<li>
			<?php echo $this->Html->link(__('Export to Yahoo Calendar'), 
				('http://calendar.yahoo.com/?v=60&VIEW=d
				&in_loc=' . $location . '
				&type=20
				&TITLE=' . $event['Event']['name'] . '
				&ST=' . $startdate1 . 'T' . $startdate2 . '
				&DUR=' . $DURheure . $DURmin . '
				&URL=' . $event['Event']['url'] . '
				&DESC=' . $event['Event']['description'] ), 
				array('class' => 'button', 'target' => '_blank')); 
			?> 
		</li>
		<li>
			<?php echo $this->Html->link(__('Export to Outlook Calendar'), 
				('http://calendar.live.com/calendar/calendar.aspx?rru=addevent
				&dtstart=' . $startdate1 . 'T' . $startdate2 . '
				&dtend=' . $enddate1 . 'T' . $enddate2 . '
				&summary=' . $event['Event']['name'] . '
				&location=' . $location . '
				&description=' . $event['Event']['description']), 
				array('target' => '_blank')); 
			?> 
		</li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organizers'); ?></h3>
	<?php if (!empty($event['Organizer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Organizer'] as $organizer): ?>
		<tr>
			<td><?php echo $organizer['id']; ?></td>
			<td><?php echo $organizer['event_id']; ?></td>
			<td><?php echo $organizer['organization_id']; ?></td>
			<td><?php echo $organizer['created']; ?></td>
			<td><?php echo $organizer['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organizers', 'action' => 'view', 'id' => $organizer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organizers', 'action' => 'edit', $organizer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organizers', 'action' => 'delete', $organizer['id']), null, __('Are you sure you want to delete # %s?', $organizer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organizer'), array('controller' => 'organizers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($event['Tag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['name']; ?></td>
			<td><?php echo $tag['created']; ?></td>
			<td><?php echo $tag['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', 'id' => $tag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
