<?php

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