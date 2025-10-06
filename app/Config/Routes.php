<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/

$routes->setDefaultController('Access');
$routes->setDefaultMethod('index');
$routes->setAutoRoute(true);

$routes->get('/Main', 'Main::index');
