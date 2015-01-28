<?php
$vcalendar = new Sabre\VObject\Component\VCalendar();

$url = $this->Link->eventUrl(
	$event,
	['full' => true]
);
$vcalendar->add('VEVENT', [
	'UID' => $event['Event']['uid'],
    'SUMMARY' => $event['Event']['name'],
	'DESCRIPTION' => $event['Event']['description'] . "\n\n" . $url,
    'LOCATION' => $event['Venue']['oneliner'],
    'DTSTART' => new \DateTime($event['Event']['start_at']),
    'DTEND' => new \DateTime($event['Event']['end_at']),
    'URL' => $url,
]);

echo $vcalendar->serialize();