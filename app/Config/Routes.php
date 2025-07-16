<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Acesso::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('usuarios', 'User::index');
    $routes->post('usuarios/salvar', 'User::save');
});

$routes->setAutoRoute(false); // Segurança: evita acesso indesejado a métodos públicos
