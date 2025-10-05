<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/

$routes->setDefaultMethod('index');
$routes->setDefaultController('Access/index');
$routes->setAutoRoute(true); 

$routes->get('/Main', 'Main::index');
