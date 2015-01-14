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

//bordeaux
Router::connect(
	'/:slug',
	['controller' => 'editions', 'action' => 'view']
);

//feeds/bordeaux.ics
Router::connect(
	'/feeds/:slug',
	['controller' => 'events', 'action' => 'index', 'feed' => true]
);

//bordeaux/annuaire
Router::connect(
	'/:slug/annuaire',
	['controller' => 'organizations', 'action' => 'index']
);

//bordeaux/evenements
Router::connect(
	'/:slug/evenements',
	['controller' => 'events', 'action' => 'index']
);

//bordeaux/evenement/3/happynum
Router::connect(
	'/:slug/evenement/:id/:bslug',
	['controller' => 'events', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

//bordeaux/1/aquinum
Router::connect(
	'/:slug/:id/:bslug',
	['controller' => 'organizations', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

//bordeaux/1/aquinum/evenements
Router::connect(
	'/:slug/:organization_id/:bslug/evenements',
	['controller' => 'events', 'action' => 'index']
);

//bordeaux/lieu/2/le-node
Router::connect(
	'/:slug/lieu/:id/:bslug',
	['controller' => 'places', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

//bordeaux/lieu/2/le-node/evenements
Router::connect(
	'/:slug/lieu/:place_id/:bslug/evenements',
	['controller' => 'events', 'action' => 'index']
);
