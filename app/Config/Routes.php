<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

// Buku
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/tambah', 'Buku::tambah');
$routes->post('/buku/simpan', 'Buku::simpan');
$routes->get('/buku/ubah/(:num)', 'Buku::ubah/$1');
$routes->post('/buku/update/(:num)', 'Buku::update/$1');
$routes->delete('/buku/(:num)', 'Buku::delete/$1');   // ini untuk form DELETE
$routes->get('/buku/(:num)', 'Buku::detail/$1');

// Anggota
$routes->get('/anggota', 'Anggota::index');
$routes->get('/anggota/tambah', 'Anggota::tambah');
$routes->post('/anggota/simpan', 'Anggota::simpan');
$routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
$routes->post('/anggota/update/(:num)', 'Anggota::update/$1');
$routes->get('/anggota/delete/(:num)', 'Anggota::delete/$1');
$routes->get('/anggota/(:num)', 'Anggota::detail/$1');     // taruh terakhir
