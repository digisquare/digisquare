<div class="editions view">
<h2><?php echo __('Edition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($edition['Edition']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Edition'), array('action' => 'edit', 'id' => $edition['Edition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Edition'), array('action' => 'delete', 'id' => $edition['Edition']['id']), null, __('Are you sure you want to delete # %s?', $edition['Edition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Editions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Startups'), array('controller' => 'startups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Startup'), array('controller' => 'startups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($edition['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Edition Id'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Start At'); ?></th>
		<th><?php echo __('End At'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($edition['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['edition_id']; ?></td>
			<td><?php echo $event['place_id']; ?></td>
			<td><?php echo $event['name']; ?></td>
			<td><?php echo $event['description']; ?></td>
			<td><?php echo $event['start_at']; ?></td>
			<td><?php echo $event['end_at']; ?></td>
			<td><?php echo $event['status']; ?></td>
			<td><?php echo $event['url']; ?></td>
			<td><?php echo $event['created']; ?></td>
			<td><?php echo $event['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', 'id' => $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Organizations'); ?></h3>
	<?php if (!empty($edition['Organization'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Edition Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Descritpion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($edition['Organization'] as $organization): ?>
		<tr>
			<td><?php echo $organization['id']; ?></td>
			<td><?php echo $organization['place_id']; ?></td>
			<td><?php echo $organization['edition_id']; ?></td>
			<td><?php echo $organization['name']; ?></td>
			<td><?php echo $organization['descritpion']; ?></td>
			<td><?php echo $organization['created']; ?></td>
			<td><?php echo $organization['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organizations', 'action' => 'view', 'id' => $organization['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organizations', 'action' => 'edit', $organization['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organizations', 'action' => 'delete', $organization['id']), null, __('Are you sure you want to delete # %s?', $organization['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Places'); ?></h3>
	<?php if (!empty($edition['Place'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Edition Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Zipcode'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Country Code'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($edition['Place'] as $place): ?>
		<tr>
			<td><?php echo $place['id']; ?></td>
			<td><?php echo $place['edition_id']; ?></td>
			<td><?php echo $place['name']; ?></td>
			<td><?php echo $place['address']; ?></td>
			<td><?php echo $place['zipcode']; ?></td>
			<td><?php echo $place['city']; ?></td>
			<td><?php echo $place['country_code']; ?></td>
			<td><?php echo $place['latitude']; ?></td>
			<td><?php echo $place['longitude']; ?></td>
			<td><?php echo $place['created']; ?></td>
			<td><?php echo $place['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'places', 'action' => 'view', 'id' => $place['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'places', 'action' => 'edit', $place['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'places', 'action' => 'delete', $place['id']), null, __('Are you sure you want to delete # %s?', $place['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Startups'); ?></h3>
	<?php if (!empty($edition['Startup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Edition Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Contacts'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($edition['Startup'] as $startup): ?>
		<tr>
			<td><?php echo $startup['id']; ?></td>
			<td><?php echo $startup['edition_id']; ?></td>
			<td><?php echo $startup['name']; ?></td>
			<td><?php echo $startup['description']; ?></td>
			<td><?php echo $startup['contacts']; ?></td>
			<td><?php echo $startup['created']; ?></td>
			<td><?php echo $startup['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'startups', 'action' => 'view', 'id' => $startup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'startups', 'action' => 'edit', $startup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'startups', 'action' => 'delete', $startup['id']), null, __('Are you sure you want to delete # %s?', $startup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Startup'), array('controller' => 'startups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
