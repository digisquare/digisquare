<?php

Configure::write('debug', 2);

Configure::write('Error', array(
	'handler' => 'ErrorHandler::handleError',
	'level' => E_ALL & ~E_DEPRECATED,
	'trace' => true
));

Configure::write('Exception', array(
	'handler' => 'ErrorHandler::handleException',
	'renderer' => 'ExceptionRenderer',
	'log' => true
));

Configure::write('App.encoding', 'UTF-8');

//Configure::write('Routing.prefixes', array('admin'));

//Configure::write('Cache.disable', true);

//Configure::write('Cache.check', true);

Configure::write('Session', array(
	'defaults' => 'php',
	'timeout' => 36000,
	'checkAgent' => false,
	'autoRegenerate' => true,
	'cookie' => 'digisquare',
));

Configure::write('Security.salt', '550208b6f96cb4d3e9c67c67b20175b8d19dbbb1');

Configure::write('Security.cipherSeed', '356466336439333964393233376339');

Configure::write('Acl.classname', 'DbAcl');
Configure::write('Acl.database', 'default');

date_default_timezone_set('Europe/Paris');

$engine = 'File';

$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}

$prefix = 'digisquare_';

Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));

Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));
