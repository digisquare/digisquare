<?php
echo $this->Html->link(
	'<span class="fa-stack fa-lg">
		<i class="fa fa-square fa-stack-2x bc-color-outlook"></i>
		<i class="socicon socicon-outlook fa-stack-1x fa-inverse"></i>
	</span>',
	'http://calendar.live.com/calendar/calendar.aspx?rru=addevent'
		. '&dtstart=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['start_at']))
		. '&dtend=' . gmdate("Ymd\THis\Z", strtotime($event['Event']['end_at']))
		. '&summary=' . urlencode($event['Event']['name'])
		. '&location=' . urlencode($event['Venue']['oneliner'])
		. '&description=' . urlencode($event['Event']['description'])
	,
	['target' => '_blank', 'escape' => false, 'title' => __('Export to Outlook Calendar')]
);