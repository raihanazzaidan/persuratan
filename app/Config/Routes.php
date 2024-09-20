<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Umum\Beranda::index');

// CRUD User
$routes->get('/beranda/adduser', 'Umum\Beranda::adduser');
$routes->post('/beranda/adduser/prosesadduser', 'Umum\Beranda::prosesadduser');
$routes->get('/beranda/edituser/(:any)', 'Umum\Beranda::edituser/$1');
$routes->post('/beranda/edituser/prosesedituser/(:any)', 'Umum\Beranda::prosesedituser/$1');
$routes->get('/beranda/hapususer/(:any)', 'Umum\Beranda::hapususer/$1');

// CRUD Subsatker
$routes->get('/subsatker', 'Umum\Subsatker::getSubsatker');
$routes->get('/subsatker/addsubsatker', 'Umum\Subsatker::addSubsatker');
$routes->post('/subsatker/addsubsatker/prosesaddsubsatker', 'Umum\Subsatker::prosesAddSubsatker');
$routes->get('/subsatker/editsubsatker/(:any)', 'Umum\Subsatker::editSubsatker/$1');
$routes->post('/subsatker/editsubsatker/proseseditsubsatker/(:any)', 'Umum\Subsatker::prosesEditSubsatker/$1');
$routes->get('/subsatker/hapussubsatker/(:any)', 'Umum\Subsatker::hapusSubsatker/$1');

// CRUD Jenis Induk Subsatker
$routes->get('/jenis-induk-subsatker', 'Umum\JenisIndukSubsatker::getJenisIndukSubsatker');
$routes->get('/jenis-induk-subsatker/addjenisinduksubsatker', 'Umum\JenisIndukSubsatker::addJenisIndukSubsatker');
$routes->post('/jenis-induk-subsatker/addjenisinduksubsatker/prosesaddjenisinduksubsatker', 'Umum\JenisIndukSubsatker::prosesAddJenisIndukSubsatker');
$routes->get('/jenis-induk-subsatker/editjenisinduksubsatker/(:any)', 'Umum\JenisIndukSubsatker::editJenisIndukSubsatker/$1');
$routes->post('/jenis-induk-subsatker/editjenisinduksubsatker/proseseditjenisinduksubsatker/(:any)', 'Umum\JenisIndukSubsatker::prosesEditJenisIndukSubsatker/$1');
$routes->get('/subsatker/hapussubsatker/(:any)', 'Umum\Subsatker::hapusSubsatker/$1');