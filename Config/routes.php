<?php
Router::connect('/',						array('controller' => 'editions', 'action' => 'index'));

Router::parseExtensions('rss', 'json', 'ics');

/**
 * Opauth Plugin Routing
 */
Router::connect('/auth/callback',			array('plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'callback'));
Router::connect('/auth/*',					array('plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'index'));
Router::connect('/opauth-complete/*',		array('controller' => 'authentications', 'action' => 'callback'));

/**
 * App Routing
 */
$controllers = array('editions', 'places', 'events', 'organizations', 'tags', 'startups', 'users', 'google_calendar_events');
foreach ($controllers as $controller) {
	Router::connect('/' . $controller,					array('controller' => $controller, 'action' => 'index'));
	Router::connect('/' . $controller . '/:id',			array('controller' => $controller, 'action' => 'view'), array('pass' => array('id'), 'id' => '[0-9]+'));
	Router::connect('/' . $controller . '/:id/:action',	array('controller' => $controller), array('pass' => array('id'), 'id' => '[0-9]+'));
	Router::connect('/' . $controller . '/:action',		array('controller' => $controller));
}

/**
 * Editions Routing
 */
Router::connect(
	'/:slug',
	array('controller' => 'editions', 'action' => 'view'),
	array('pass' => array('slug'), 'slug' => '[a-zA-Z0-9_-]+')
);

Router::connect(
	'/:slug/:action',
	array('controller' => 'editions'),
	array('pass' => array('slug'), 'slug' => '[a-zA-Z0-9_-]+')
);

