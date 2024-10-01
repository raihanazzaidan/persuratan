<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Authentication\Login::index');
$routes->get('/callback-request-login', 'Authentication\Login::callback');
$routes->get('/logout', 'Authentication\Login::logout');

$routes->get('/beranda', 'Beranda\Beranda::index');


//--------- ADMINISTRASI ---------

// CRUD User
$routes->get('/administrasi/user/', 'Administrasi\User::getuser');
$routes->get('/administrasi/user/adduser', 'Administrasi\User::adduser');
$routes->post('/administrasi/user/adduser/prosesadduser', 'Administrasi\User::prosesadduser');
$routes->get('/administrasi/user/edituser/(:any)', 'Administrasi\User::edituser/$1');
$routes->post('/administrasi/user/edituser/prosesedituser/(:any)', 'Administrasi\User::prosesedituser/$1');
$routes->get('/administrasi/user/hapususer/(:any)', 'Administrasi\User::hapususer/$1');

// CRUD Jenis Induk Subsatker
$routes->get('/administrasi/jenis-induk-subsatker', 'Administrasi\JenisIndukSubsatker::getJenisIndukSubsatker');
$routes->get('/administrasi/jenis-induk-subsatker/addjenisinduksubsatker', 'Administrasi\JenisIndukSubsatker::addJenisIndukSubsatker');
$routes->post('/administrasi/jenis-induk-subsatker/addjenisinduksubsatker/prosesaddjenisinduksubsatker', 'Administrasi\JenisIndukSubsatker::prosesAddJenisIndukSubsatker');
$routes->get('/administrasi/jenis-induk-subsatker/editjenisinduksubsatker/(:any)', 'Administrasi\JenisIndukSubsatker::editJenisIndukSubsatker/$1');
$routes->post('/administrasi/jenis-induk-subsatker/editjenisinduksubsatker/proseseditjenisinduksubsatker/(:any)', 'Administrasi\JenisIndukSubsatker::prosesEditJenisIndukSubsatker/$1');
$routes->get('/administrasi/jenis-induk-subsatker/hapusjenisinduksubsatker/(:any)', 'Administrasi\JenisIndukSubsatker::hapusJenisIndukSubsatker/$1');

// CRUD Subsatker
$routes->get('/administrasi/subsatker', 'Administrasi\Subsatker::getSubsatker');
$routes->get('/administrasi/subsatker/addsubsatker', 'Administrasi\Subsatker::addSubsatker');
$routes->post('/administrasi/subsatker/addsubsatker/prosesaddsubsatker', 'Administrasi\Subsatker::prosesAddSubsatker');
$routes->get('/administrasi/subsatker/editsubsatker/(:any)', 'Administrasi\Subsatker::editSubsatker/$1');
$routes->post('/administrasi/subsatker/editsubsatker/proseseditsubsatker/(:any)', 'Administrasi\Subsatker::prosesEditSubsatker/$1');
$routes->get('/administrasi/subsatker/hapussubsatker/(:any)', 'Administrasi\Subsatker::hapusSubsatker/$1');

// CRUD Jabatan
$routes->get('/administrasi/jabatan', 'Administrasi\Jabatan::getJabatan');
$routes->get('/administrasi/jabatan/addjabatan', 'Administrasi\Jabatan::addJabatan');
$routes->post('/administrasi/jabatan/addjabatan/prosesaddjabatan', 'Administrasi\Jabatan::prosesAddJabatan');
$routes->get('/administrasi/jabatan/editjabatan/(:any)', 'Administrasi\Jabatan::editJabatan/$1');
$routes->post('/administrasi/jabatan/editjabatan/proseseditjabatan/(:any)', 'Administrasi\Jabatan::prosesEditJabatan/$1');
$routes->get('/administrasi/jabatan/hapusjabatan/(:any)', 'Administrasi\Jabatan::hapusJabatan/$1');

// CRUD Grup Jabatan
$routes->get('/administrasi/grup-jabatan', 'Administrasi\GrupJabatan::getGrupJabatan');
$routes->get('/administrasi/grup-jabatan/addgrupjabatan', 'Administrasi\GrupJabatan::addGrupJabatan');
$routes->post('/administrasi/grup-jabatan/addgrupjabatan/prosesaddgrupjabatan', 'Administrasi\GrupJabatan::prosesAddGrupJabatan');
$routes->get('/administrasi/grup-jabatan/editgrupjabatan/(:any)', 'Administrasi\GrupJabatan::editGrupJabatan/$1');
$routes->post('/administrasi/grup-jabatan/editgrupjabatan/proseseditgrupjabatan/(:any)', 'Administrasi\GrupJabatan::prosesEditGrupJabatan/$1');
$routes->get('/administrasi/grup-jabatan/hapusgrupjabatan/(:any)', 'Administrasi\GrupJabatan::hapusGrupJabatan/$1');

// CRUD Tipe User
$routes->get('/administrasi/tipe-user', 'Administrasi\TipeUser::getTipeUser');
$routes->get('/administrasi/tipe-user/addtipeuser', 'Administrasi\TipeUser::addTipeUser');
$routes->post('/administrasi/tipe-user/addtipeuser/prosesaddtipeuser', 'Administrasi\TipeUser::prosesAddTipeUser');
$routes->get('/administrasi/tipe-user/edittipeuser/(:any)', 'Administrasi\TipeUser::editTipeUser/$1');
$routes->post('/administrasi/tipe-user/edittipeuser/prosesedittipeuser/(:any)', 'Administrasi\TipeUser::prosesEditTipeUser/$1');
$routes->get('/administrasi/tipe-user/hapustipeuser/(:any)', 'Administrasi\TipeUser::hapusTipeUser/$1');

// CRUD Hak Akses
$routes->get('/administrasi/hak-akses', 'Administrasi\HakAkses::getHakAkses');
$routes->get('/administrasi/hak-akses/addhakakses', 'Administrasi\HakAkses::addHakAkses');
$routes->post('/administrasi/hak-akses/addhakakses/prosesaddhakakses', 'Administrasi\HakAkses::prosesAddHakAkses');
$routes->get('/administrasi/hak-akses/edithakakses/(:any)', 'Administrasi\HakAkses::editHakAkses/$1');
$routes->post('/administrasi/hak-akses/edithakakses/prosesedithakakses/(:any)', 'Administrasi\HakAkses::prosesEditHakAkses/$1');
$routes->get('/administrasi/hak-akses/hapushakakses/(:any)', 'Administrasi\HakAkses::hapusHakAkses/$1');

// CRUD User Role
$routes->get('/administrasi/user-role', 'Administrasi\UserRole::getUserRole');
$routes->get('/administrasi/user-role/adduserrole', 'Administrasi\UserRole::addUserRole');
$routes->post('/administrasi/user-role/adduserrole/pilih-user', 'Administrasi\UserRole::pilihuser');
$routes->get('/administrasi/user-role/adduserrole/hapus-pilihan-user', 'Administrasi\UserRole::hapus_session_pilih_user');
$routes->post('/administrasi/user-role/adduserrole/prosesadduserrole', 'Administrasi\UserRole::prosesAddUserRole');
$routes->get('/administrasi/user-role/edituserrole/(:any)', 'Administrasi\UserRole::editUserRole/$1');
$routes->post('/administrasi/user-role/edituserrole/prosesedituserrole/(:any)', 'Administrasi\UserRole::prosesEditUserRole/$1');
$routes->get('/administrasi/user-role/hapususerrole/(:any)', 'Administrasi\UserRole::hapusUserRole/$1');


//--------- SURAT ---------

// CRUD Jenis Naskah
$routes->get('/surat/jenis-naskah', 'Surat\JenisNaskah::getJenisNaskah');
$routes->get('/surat/jenis-naskah/addjenisnaskah', 'Surat\JenisNaskah::addJenisNaskah');
$routes->post('/surat/jenis-naskah/addjenisnaskah/prosesaddjenisnaskah', 'Surat\JenisNaskah::prosesAddJenisNaskah');
$routes->get('/surat/jenis-naskah/editjenisnaskah/(:any)', 'Surat\JenisNaskah::editJenisNaskah/$1');
$routes->post('/surat/jenis-naskah/editjenisnaskah/proseseditjenisnaskah/(:any)', 'Surat\JenisNaskah::prosesEditJenisNaskah/$1');
$routes->get('/surat/jenis-naskah/hapusjenisnaskah/(:any)', 'Surat\JenisNaskah::hapusJenisNaskah/$1');

// CRUD Sifat Naskah
$routes->get('/surat/sifat-naskah', 'Surat\SifatNaskah::getSifatNaskah');
$routes->get('/surat/sifat-naskah/addsifatnaskah', 'Surat\SifatNaskah::addSifatNaskah');
$routes->post('/surat/sifat-naskah/addsifatnaskah/prosesaddsifatnaskah', 'Surat\SifatNaskah::prosesAddSifatNaskah');
$routes->get('/surat/sifat-naskah/editsifatnaskah/(:any)', 'Surat\SifatNaskah::editSifatNaskah/$1');
$routes->post('/surat/sifat-naskah/editsifatnaskah/proseseditsifatnaskah/(:any)', 'Surat\SifatNaskah::prosesEditSifatNaskah/$1');
$routes->get('/surat/sifat-naskah/hapussifatnaskah/(:any)', 'Surat\SifatNaskah::hapusSifatNaskah/$1');

// CRUD Registrasi Surat Masuk
$routes->get('/surat/registrasi-surat-masuk', 'Surat\RegistrasiSuratMasuk::getSuratMasuk');
$routes->get('/surat/registrasi-surat-masuk/addsuratmasuk', 'Surat\RegistrasiSuratMasuk::addSuratMasuk');
$routes->post('/surat/registrasi-surat-masuk/addsuratmasuk/prosesaddsuratmasuk', 'Surat\RegistrasiSuratMasuk::prosesAddSuratMasuk');
$routes->get('/surat/registrasi-surat-masuk/editsuratmasuk/(:any)', 'Surat\RegistrasiSuratMasuk::editSuratMasuk/$1');
$routes->post('/surat/registrasi-surat-masuk/editsuratmasuk/proseseditsuratmasuk/(:any)', 'Surat\RegistrasiSuratMasuk::prosesEditSuratMasuk/$1');
$routes->get('/surat/registrasi-surat-masuk/hapussuratmasuk/(:any)', 'Surat\RegistrasiSuratMasuk::hapusSuratMasuk/$1');