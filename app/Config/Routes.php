<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Access::index');
$routes->get('/access', 'Access::index');
$routes->post('/access/login', 'Access::login');
$routes->get('/access/register', 'Access::register');
$routes->get('/Main', 'Main::index');

$routes->setAutoRoute(false); // Segurança: evita acesso indesejado a métodos públicos
