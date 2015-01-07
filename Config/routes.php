<?php
Router::connect('/',						array('controller' => 'editions', 'action' => 'index'));

Router::parseExtensions('rss', 'json', 'ics');

/**
 * Opauth Plugin Routing
 */
Router::connect('/auth/callback',		['plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'callback']);
Router::connect('/auth/*',				['plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'index']);
Router::connect('/opauth-complete/*',	['controller' => 'authentications', 'action' => 'callback']);

/**
 * App Routing
 */
$controllers = [
	'editions', 'places', 'events',
	'organizations', 'tags', 'startups',
	'users', 'google_calendar_events', 'organizations'
];
foreach ($controllers as $controller) {
	Router::connect('/' . $controller,					['controller' => $controller, 'action' => 'index']);
	Router::connect('/' . $controller . '/:id',			['controller' => $controller, 'action' => 'view'], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/' . $controller . '/:id/:action',	['controller' => $controller], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/' . $controller . '/:action',		['controller' => $controller]);
}

/**
 * Editions Routing
 */
Router::connect(
	'/:slug',
	['controller' => 'editions', 'action' => 'view'],
	['pass' => ['slug'], 'slug' => '[a-zA-Z0-9_-]+']
);

Router::connect(
	'/:slug/:action',
	['controller' => 'editions'],
	['pass' => ['slug'], 'slug' => '[a-zA-Z0-9_-]+']
);
