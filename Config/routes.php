<?php
Router::parseExtensions('rss', 'json', 'ics');

Router::connect('/',	['controller' => 'editions', 'action' => 'index']);

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
 * /bordeaux => annuaire ?
 * /bordeaux/1/aquinum
 * /bordeaux/lieux => carte
 * /bordeaux/lieu/2/le-node
 * /bordeaux/evenements => calendrier
 * /bordeaux/evenement/3/happynum
 */
Router::connect(
	'/:slug',
	['controller' => 'editions', 'action' => 'view']
);

Router::connect(
	'/:slug/:id/:bslug',
	['controller' => 'organizations', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

Router::connect(
	'/:slug/lieu/:id/:bslug',
	['controller' => 'places', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

Router::connect(
	'/:slug/evenements',
	['controller' => 'events', 'action' => 'index']
);

Router::connect(
	'/:slug/evenement/:id/:bslug',
	['controller' => 'events', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);
