<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/

$routes->post('access/login', 'Access::login');

$routes->setDefaultController('Access');
$routes->setDefaultMethod('index');
$routes->setAutoRoute(true);

$routes->get('/Main', 'Main::index');
