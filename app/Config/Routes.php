<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->post('/', 'Home::index');   

$routes->get('/produk','Produk::index');

$routes->get('/produk/tampil', 'Produk::tampil_produk');
$routes->post('/produk/simpan', 'Produk::simpan_produk');
$routes->delete('/produk/delete/(:num)', 'Produk::hapus_data/$1');
$routes->post('/produk/edit/(:num)', 'Produk::edit_produk/$1');
$routes->post('/produk/update', 'Produk::update_produk');

$routes->get('/pelanggan','Pelanggan::index');

$routes->get('/pelanggan/tampil', 'Pelanggan::tampil_pelanggan');
$routes->post('/pelanggan/simpan', 'Pelanggan::simpan_pelanggan');
$routes->delete('/pelanggan/delete/(:num)', 'Pelanggan::hapus_data/$1');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit_pelanggan/$1');
$routes->post('/pelanggan/update', 'Pelanggan::update_pelanggan');