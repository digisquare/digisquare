<?php

Router::connect('/',						array('controller' => 'editions', 'action' => 'index'));

Router::connect('/:controller',				array('action' => 'index'));
Router::connect('/:controller/:id',			array('action' => 'view'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/:controller/:id/:action',	array(), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/:controller/:action',		array());
