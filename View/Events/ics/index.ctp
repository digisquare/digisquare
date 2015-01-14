<?php
$vcalendar = new Sabre\VObject\Component\VCalendar();

foreach ($events as $event) {
	$vcalendar->add('VEVENT', [
		'UID' => $event['Event']['uid'],
		'SUMMARY' => $event['Event']['name'],
		'DESCRIPTION' => $event['Event']['description'],
		'LOCATION' => $event['Place']['oneliner'],
		'DTSTART' => new \DateTime($event['Event']['start_at']),
		'DTEND' => new \DateTime($event['Event']['end_at']),
		'URL' => $event['Event']['url'],
	]);
}

echo $vcalendar->serialize();