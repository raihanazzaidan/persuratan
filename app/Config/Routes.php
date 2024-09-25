<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda\Beranda::index');

// CRUD User
// $routes->get('/beranda/adduser', 'Umum\Beranda::adduser');
// $routes->post('/beranda/adduser/prosesadduser', 'Umum\Beranda::prosesadduser');
// $routes->get('/beranda/edituser/(:any)', 'Umum\Beranda::edituser/$1');
// $routes->post('/beranda/edituser/prosesedituser/(:any)', 'Umum\Beranda::prosesedituser/$1');
// $routes->get('/beranda/hapususer/(:any)', 'Umum\Beranda::hapususer/$1');

// CRUD User
$routes->get('/administrasi/user/', 'Administrasi\User::getuser');
$routes->get('/administrasi/user/adduser', 'Administrasi\User::adduser');
$routes->post('/administrasi/user/adduser/prosesadduser', 'Administrasi\User::prosesadduser');
$routes->get('/administrasi/user/edituser/(:any)', 'Administrasi\User::edituser/$1');
$routes->post('/administrasi/user/edituser/prosesedituser/(:any)', 'Administrasi\User::prosesedituser/$1');
$routes->get('/administrasi/user/hapususer/(:any)', 'Administrasi\User::hapususer/$1');

// CRUD Subsatker
$routes->get('/administrasi/subsatker', 'Administrasi\Subsatker::getSubsatker');
$routes->get('/administrasi/subsatker/addsubsatker', 'Administrasi\Subsatker::addSubsatker');
$routes->post('/administrasi/subsatker/addsubsatker/prosesaddsubsatker', 'Administrasi\Subsatker::prosesAddSubsatker');
$routes->get('/administrasi/subsatker/editsubsatker/(:any)', 'Administrasi\Subsatker::editSubsatker/$1');
$routes->post('/administrasi/subsatker/editsubsatker/proseseditsubsatker/(:any)', 'Administrasi\Subsatker::prosesEditSubsatker/$1');
$routes->get('/administrasi/subsatker/hapussubsatker/(:any)', 'Administrasi\Subsatker::hapusSubsatker/$1');

// CRUD Jenis Induk Subsatker
$routes->get('/administrasi/jenis-induk-subsatker', 'Administrasi\JenisIndukSubsatker::getJenisIndukSubsatker');
$routes->get('/administrasi/jenis-induk-subsatker/addjenisinduksubsatker', 'Administrasi\JenisIndukSubsatker::addJenisIndukSubsatker');
$routes->post('/administrasi/jenis-induk-subsatker/addjenisinduksubsatker/prosesaddjenisinduksubsatker', 'Administrasi\JenisIndukSubsatker::prosesAddJenisIndukSubsatker');
$routes->get('/administrasi/jenis-induk-subsatker/editjenisinduksubsatker/(:any)', 'Administrasi\JenisIndukSubsatker::editJenisIndukSubsatker/$1');
$routes->post('/administrasi/jenis-induk-subsatker/editjenisinduksubsatker/proseseditjenisinduksubsatker/(:any)', 'Administrasi\JenisIndukSubsatker::prosesEditJenisIndukSubsatker/$1');
$routes->get('/administrasi/jenis-induk-subsatker/hapusjenisinduksubsatker/(:any)', 'Administrasi\JenisIndukSubsatker::hapusJenisIndukSubsatker/$1');

// CRUD Jabatan
$routes->get('/administrasi/jabatan', 'Umum\Jabatan::getJabatan');
$routes->get('/administrasi/jabatan/addjabatan', 'Umum\Jabatan::addJabatan');
$routes->post('/administrasi/jabatan/addjabatan/prosesaddjabatan', 'Umum\Jabatan::prosesAddJabatan');
$routes->get('/administrasi/jabatan/editjabatan/(:any)', 'Umum\Jabatan::editJabatan/$1');
$routes->post('/administrasi/jabatan/editjabatan/proseseditjabatan/(:any)', 'Umum\Jabatan::prosesEditJabatan/$1');
$routes->get('/administrasi/jabatan/hapusjabatan/(:any)', 'Umum\Jabatan::hapusJabatan/$1');

// CRUD Tipe User
$routes->get('/administrasi/tipe-user', 'Administrasi\TipeUser::getTipeUser');
$routes->get('/administrasi/tipe-user/addtipeuser', 'Administrasi\TipeUser::addTipeUser');
$routes->post('/administrasi/tipe-user/addtipeuser/prosesaddtipeuser', 'Administrasi\TipeUser::prosesAddTipeUser');
$routes->get('/administrasi/tipe-user/edittipeuser/(:any)', 'Administrasi\TipeUser::editTipeUser/$1');
$routes->post('/administrasi/tipe-user/edittipeuser/prosesedittipeuser/(:any)', 'Administrasi\TipeUser::prosesEditTipeUser/$1');
$routes->get('/administrasi/tipe-user/hapustipeuser/(:any)', 'Administrasi\TipeUser::hapusTipeUser/$1');

// CRUD User Role
$routes->get('/administrasi/user-role', 'Administrasi\UserRole::getUserRole');
$routes->get('/administrasi/user-role/adduserrole', 'Administrasi\UserRole::addUserRole');
$routes->post('/administrasi/user-role/adduserrole/prosesadduserrole', 'Administrasi\UserRole::prosesUserRole');
$routes->get('/administrasi/user-role/edituserrole/(:any)', 'Administrasi\UserRole::editUserRole/$1');
$routes->post('/administrasi/user-role/edituserrole/prosesedituserrole/(:any)', 'Administrasi\UserRole::prosesEditUserRole/$1');
$routes->get('/administrasi/user-role/hapususerrole/(:any)', 'Administrasi\UserRole::hapusUserRole/$1');