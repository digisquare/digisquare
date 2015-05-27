<?php
Router::parseExtensions('rss', 'json', 'ics');

Router::connect('/',					['controller' => 'pages', 'action' => 'display', 'home']);
Router::connect('/amour-et-creation',	['controller' => 'pages', 'action' => 'display', 'thanks']);
Router::connect('/mention-legales',		['controller' => 'pages', 'action' => 'display', 'legal']);

/**
 * Opauth Plugin Routing
 */
Router::connect('/auth/callback',		['plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'callback']);
Router::connect('/auth/*',				['plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'index']);
Router::connect('/opauth-complete/*',	['controller' => 'authentications', 'action' => 'callback']);

//membre/1/damien-varron
Router::connect(
	'/membre/:id/:slug',
	['controller' => 'users', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

Router::connect(
	'/profil',
	['controller' => 'users', 'action' => 'edit']
);

Router::connect(
	'/preferences',
	['controller' => 'settings', 'action' => 'edit']
);

Router::connect(
	'/evenements',
	['controller' => 'events', 'action' => 'index']
);

Router::connect(
	'/annuaire',
	['controller' => 'organizations', 'action' => 'index']
);

Router::connect(
	'/carte',
	['controller' => 'venues', 'action' => 'index']
);

Router::connect(
	'/startups',
	['controller' => 'startups', 'action' => 'index']
);

/**
 * App Routing
 */
$controllers = [
	'editions', 'venues', 'events', 'groups', 'organizations',
	'users', 'google_calendar_events', 'organizations', 'tags',
	'settings', 'campaigns', 'organizers', 'members'
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

//bordeaux/carte
Router::connect(
	'/:slug/carte',
	['controller' => 'venues', 'action' => 'index']
);

//bordeaux/startups
Router::connect(
	'/:slug/startups',
	['controller' => 'startups', 'action' => 'index']
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
	['controller' => 'venues', 'action' => 'view'],
	['pass' => ['id'], 'id' => '[0-9]+']
);

//bordeaux/lieu/2/le-node/evenements
Router::connect(
	'/:slug/lieu/:venue_id/:bslug/evenements',
	['controller' => 'events', 'action' => 'index']
);

//tag/javascript
Router::connect(
	'/tag/:slug',
	['controller' => 'tags', 'action' => 'view']
);
