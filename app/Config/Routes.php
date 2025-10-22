<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

// Dosen
$routes->get('/dosen', 'dosen::index');
$routes->get('/dosen/tambah', 'dosen::tambah');
$routes->post('/dosen/simpan', 'dosen::simpan');
$routes->get('/dosen/edit/(:num)', 'dosen::edit/$1');
$routes->post('/dosen/update/(:num)', 'dosen::update/$1');
$routes->get('/dosen/delete/(:num)', 'dosen::delete/$1');
$routes->get('/dosen/(:num)', 'dosen::detail/$1');     // taruh terakhir
