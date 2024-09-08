<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('admin', ['filter' => 'group:admin,superadmin'], static function ($routes) {
  $routes->resource('dashboard', ['controller' => 'Dashboard']);
});
// $routes->get('/dashboard', 'Dashboard::index');

service('auth')->routes($routes);
