<?php
echo $this->Html->meta([
	'property' => 'og:title',
	'content' => $title_for_layout
]);
echo $this->Html->meta([
	'property' => 'fb:app_id',
	'content' => '1520818964809923'
]);
echo $this->Html->meta([
	'property' => 'og:url',
	'content' => $this->Html->url($this->here, true)
]); 
echo $this->Html->meta([
	'property' => 'og:image',
	'content' => $this->Html->url('/img/logos/digisquare_baseline_534_280.png', true)
]);
if (isset($description_for_layout)) {
	echo $this->Html->meta([
		'property' => 'og:description',
		'content' => $description_for_layout
	]);
}
