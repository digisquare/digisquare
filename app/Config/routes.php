<?php
Router::parseExtensions('rss');
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

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
