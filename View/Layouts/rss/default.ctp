<?php
$link = $this->Html->url(
	$this->here,
	true
);
if (!isset($documentData)) {
	$documentData = array();
}
if (!isset($documentData['xmlns:atom'])) {
	$documentData['xmlns:atom'] = 'http://www.w3.org/2005/Atom';
}
if (!isset($channelData)) {
	$channelData = array();
}
if (!isset($channelData['title'])) {
	$channelData['title'] = $title_for_layout;
}
if (!isset($channelData['atom:link'])) {
	$channelData['atom:link'] = array(
		'attrib' => array(
			'href' => $link,
			'rel' => 'self',
			'type' => 'application/rss+xml'
		),
	);
}
if (!isset($channelData['language'])) {
	$channelData['language'] = 'fr-fr';
}
$channel = $this->Rss->channel(
	array(),
	$channelData,
	$content_for_layout
);
echo $this->Rss->document(
	$documentData,
	$channel
);