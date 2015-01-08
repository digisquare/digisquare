<?php if (isset($this->request->query['date'])) {
	$query_date = $this->request->query['date'];
	$date = new DateTime($query_date);
} else {
	$query_date = false;
	$date = new DateTime();
} ?>
<ul class="pagination">
	<?php if ($query_date): ?>
		<?php $date->modify('-1 month'); ?>
		<li>
			<?php echo $this->Html->link(
				'< ' . strftime('%B', $date->getTimestamp()),
				[
					'controller' => $controller,
					'action' => 'view',
					'id' => $id,
					'?' => ['date' => $date->format('Y-m')]
				]
			); ?>
		</li>
	<?php else: ?>
		<li>
			<?php echo $this->Html->link(
				'< ' . strftime('%B', $date->getTimestamp()),
				[
					'controller' => $controller,
					'action' => 'view',
					'id' => $id,
					'?' => ['date' => $date->format('Y-m')]
				]
			); ?>
		</li>
	<?php endif; ?>
	<?php $date->modify('+1 month'); ?>
	<?php if ($query_date): ?>
		<li class="current disabled">
			<?php echo $this->Html->link(
				strftime('%B', $date->getTimestamp()),
				[
					'controller' => $controller,
					'action' => 'view',
					'id' => $id,
					'?' => ['date' => $date->format('Y-m')]
				]
			); ?>
		</li>
	<?php endif; ?>
	<?php $date = $date->modify('+1 month'); ?>
	<?php if ($query_date && date('Y-m') !== $query_date): ?>
		<li>
			<?php echo $this->Html->link(
				strftime('%B', $date->getTimestamp()) . ' >',
				[
					'controller' => $controller,
					'action' => 'view',
					'id' => $id,
					'?' => ['date' => $date->format('Y-m')]
				]
			); ?>
		</li>
	<?php elseif ($query_date && date('Y-m') === $query_date): ?>
		<li>
			<?php echo $this->Html->link(
				'à venir >',
				[
					'controller' => $controller,
					'action' => 'view',
					'id' => $id,
				]
			); ?>
		</li>
	<?php endif; ?>
</ul>