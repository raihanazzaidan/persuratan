<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/beranda', 'Umum\Beranda::index');
$routes->get('/beranda/adduser', 'Umum\Beranda::adduser');
$routes->post('/beranda/adduser/prosesadduser', 'Umum\Beranda::prosesadduser');
$routes->get('/beranda/edituser/(:any)', 'Umum\Beranda::edituser/$1');
$routes->post('/beranda/edituser/prosesedituser/(:any)', 'Umum\Beranda::prosesedituser/$1');
$routes->get('/beranda/hapususer/(:any)', 'Umum\Beranda::hapususer/$1');