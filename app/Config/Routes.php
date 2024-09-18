<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/beranda', 'Umum\Beranda::index');
$routes->get('/beranda', 'Umum\Beranda\Substaker::index');
$routes->get('/beranda/adduser', 'Umum\Beranda::adduser');
$routes->post('/beranda/adduser/prosesadduser', 'Umum\Beranda::prosesadduser');

