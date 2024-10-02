<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('admin', ['filter' => 'group:admin,superadmin'], static function ($routes) {
  $routes->resource('dashboard', ['controller' => 'Dashboard']);
  $routes->resource('kategori', ['controller' => 'Kategori']);
  // ! Please don't change the order of the routes below or it will cause a bug
  $routes->get('berita/(:num)/preview', 'Berita::preview/$1');
  $routes->resource('berita', ['controller' => 'Berita']);
});
// $routes->get('/dashboard', 'Dashboard::index');

service('auth')->routes($routes);
