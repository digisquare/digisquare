<?php
echo $this->Html->link(
	'<span class="fa-stack fa-lg">
		<i class="fa fa-square fa-stack-2x bc-color-google"></i>
		<i class="fa fa-google fa-stack-1x fa-inverse"></i>
	</span>',
	'http://www.google.com/calendar/event?action=TEMPLATE'
		. '&text=' . urlencode($event['Event']['name'])
		. '&dates=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['start_at']))
		. '/' . gmdate("Ymd\THis\Z", strtotime($event['Event']['end_at']))
		. '&details=' . urlencode($event['Event']['description'])
		. '&location=' . urlencode($event['Place']['oneliner'])
	, 
	['target' => '_blank', 'escape' => false, 'title' => __('Export to Google Calendar')]
);