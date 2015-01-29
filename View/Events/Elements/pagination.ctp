<?php if (isset($this->request->query['date'])) {
	$query_date = $this->request->query['date'];
	$date = new DateTime($query_date);
} else if ('edition' === $controller) {
	$date = new DateTime('first day of this month');
	$query_date = $date->format('Y-m');
} else {
	$query_date = false;
	$date = new DateTime('first day of this month');
}
$method = 'view' . Inflector::classify($controller);
?>
<ul class="pagination">
	<?php if ($query_date): ?>
		<?php $date->modify('-1 month'); ?>
	<?php endif; ?>
	<li>
		<?php echo $this->Link->$method(
			'< ' . strftime('%B', $date->getTimestamp()),
			${$controller},
			['url' => ['?' => ['date' => $date->format('Y-m')]]]
		); ?>
	</li>
	<?php $date->modify('+1 month'); ?>
	<?php if ($query_date): ?>
		<li class="current disabled">
			<?php echo $this->Link->$method(
				strftime('%B', $date->getTimestamp()),
				${$controller},
				['url' => ['?' => ['date' => $date->format('Y-m')]]]
			); ?>
		</li>
	<?php endif; ?>
	<?php $date->modify('+1 month'); ?>
	<?php if ('edition' === $controller || ($query_date && date('Y-m') !== $query_date)): ?>
		<li>
			<?php echo $this->Link->$method(
				strftime('%B', $date->getTimestamp()) . ' >',
				${$controller},
				['url' => ['?' => ['date' => $date->format('Y-m')]]]
			); ?>
		</li>
	<?php elseif ($query_date && date('Y-m') === $query_date): ?>
		<li>
			<?php echo $this->Link->$method(
				'à venir >',
				${$controller}
			); ?>
		</li>
	<?php endif; ?>
</ul>