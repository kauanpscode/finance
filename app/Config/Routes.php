<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/

$routes->setDefaultMethod('index');
$routes->setDefaultController('Access');
$routes->setAutoRoute(true); 

$routes->get('/Main', 'Main::index');
