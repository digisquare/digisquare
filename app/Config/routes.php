<?php
Router::connect('/',						array('controller' => 'editions', 'action' => 'index'));

/**
 * Opauth Plugin Routing
 */
Router::connect('/auth/callback',			array('plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'callback'));
Router::connect('/auth/*',					array('plugin' => 'Opauth', 'controller' => 'opauth', 'action' => 'index'));
Router::connect('/opauth-complete/*',		array('controller' => 'authentications', 'action' => 'callback'));

/**
 * App Routing
 */
Router::connect('/:controller',				array('action' => 'index'));
Router::connect('/:controller/:id',			array('action' => 'view'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/:controller/:id/:action',	array(), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/:controller/:action',		array());
