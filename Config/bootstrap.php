<?php

App::import('Vendor', 'autoload');

Configure::write('Config.language', 'fra');

Cache::config('default', array('engine' => 'File'));

CakePlugin::load('BoostCake');
CakePlugin::load('Migrations');
CakePlugin::load('Opauth', array('bootstrap' => true));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

App::uses('CakeLog', 'Log');

CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));

CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

/*
 * Google Maps Embed API Key
 */

if (isset($_SERVER) && isset($_SERVER['DIGI_GOOGLE_BROWSER_KEY'])) {
	Configure::write('GoogleMapsBrowserKey', $_SERVER['DIGI_GOOGLE_BROWSER_KEY']);
}

/*
 * OAuth Keys
 */

if (isset($_SERVER) && isset($_SERVER['DIGI_FB_APP_ID'])) {
	Configure::write('Opauth.Strategy.Facebook', array(
		'app_id' => $_SERVER['DIGI_FB_APP_ID'],
		'app_secret' => $_SERVER['DIGI_FB_SECRET']
	));
}

if (isset($_SERVER) && isset($_SERVER['DIGI_TWITTER_KEY'])) {
	Configure::write('Opauth.Strategy.Twitter', array(
		'key' => $_SERVER['DIGI_TWITTER_KEY'],
		'secret' => $_SERVER['DIGI_TWITTER_SECRET']
	));
}

if (isset($_SERVER) && isset($_SERVER['DIGI_MEETUP_KEY'])) {
	Configure::write('Opauth.Strategy.Meetup', array(
		'key' => $_SERVER['DIGI_MEETUP_KEY'],
		'secret' => $_SERVER['DIGI_MEETUP_SECRET'],
		'scope' => 'ageless',
	));
}

if (isset($_SERVER) && isset($_SERVER['DIGI_GOOGLE_KEY'])) {
	Configure::write('Opauth.Strategy.Google', array(
		'client_id' => $_SERVER['DIGI_GOOGLE_KEY'],
		'client_secret' => $_SERVER['DIGI_GOOGLE_SECRET'],
		'scope' => 'openid profile email https://www.googleapis.com/auth/calendar',
		'access_type' => 'offline',
	));
}
