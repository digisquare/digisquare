<?php
$description = new \Html2Text\Html2Text($event['Event']['description']);
$start = new DateTime($event['Event']['start_at']);
$end = new DateTime($event['Event']['end_at']);
$interval = $end->diff($start);
echo $this->Html->link(
	'<span class="fa-stack fa-lg">
		<i class="fa fa-square fa-stack-2x bc-color-yahoo"></i>
		<i class="fa fa-yahoo fa-stack-1x fa-inverse"></i>
	</span>',
	'http://calendar.yahoo.com/?v=60&VIEW=d&type=20'
		. '&in_loc=' . urlencode($event['Venue']['oneliner'])
		. '&TITLE=' . urlencode($event['Event']['name'])
		. '&ST=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['start_at']))
		. '&DUR=' . $interval->format('%H%I')
		. '&DESC=' . urlencode($this->Text->truncate($description->getText(), 1200))
	,
	['target' => '_blank', 'escape' => false, 'title' => __('Export to Yahoo Calendar')]
);