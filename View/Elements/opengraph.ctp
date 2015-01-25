<?php
echo $this->Html->meta([
	'name' => 'og:title',
	'content' => $title_for_layout
]);
echo $this->Html->meta([
	'name' => 'og:url',
	'content' => $this->Html->url($this->here, true)
]); 
echo $this->Html->meta([
	'name' => 'og:image',
	'content' => $this->Html->url('/img/logos/digisquare_2000.png', true)
]);
if (isset($description_for_layout)) {
	echo $this->Html->meta([
		'name' => 'og:description',
		'content' => $description_for_layout
	]);
}
?>