<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/tambah', 'Barang::tambah');
$routes->get('/barang/detail/(:segment)', 'Barang::detail/$1');
$routes->post('/barang/prosestambah', 'Barang::prosestambah');
$routes->get('/barang/checkId', 'Barang::checkId');
$routes->get('/barang/hapus/(:segment)', 'Barang::hapus/$1');
$routes->get('/barang/edit/(:segment)', 'Barang::edit/$1');
$routes->post('/barang/prosesedit', 'Barang::prosesedit');

$routes->get('/unit', 'Unit::index');
$routes->get('/unit/tambah', 'Unit::tambah');
$routes->post('/unit/prosestambah', 'Unit::prosestambah');
$routes->get('/unit/edit/(:segment)', 'Unit::edit/$1');
$routes->post('/unit/prosesedit', 'Unit::prosesedit');
$routes->get('/unit/hapus/(:segment)', 'Unit::hapus/$1');

$routes->get('/lokasi', 'Lokasi::index');
$routes->get('/lokasi/tambah', 'Lokasi::tambah');
$routes->post('/lokasi/prosestambah', 'Lokasi::prosestambah');
$routes->get('/lokasi/edit/(:segment)', 'Lokasi::edit/$1');
$routes->post('/lokasi/prosesedit', 'Lokasi::prosesedit');
$routes->get('/lokasi/hapus/(:segment)', 'Lokasi::hapus/$1');

$routes->get('/pinjam', 'Pinjam::index');
$routes->get('/pinjam/tambah', 'Pinjam::tambah');
$routes->get('/pinjam/detail/(:segment)', 'Pinjam::detail/$1');
$routes->post('/pinjam/prosestambah', 'Pinjam::prosestambah');
$routes->get('/pinjam/checkId', 'Pinjam::checkId');
$routes->get('/pinjam/hapus/(:segment)', 'Pinjam::hapus/$1');
$routes->get('/pinjam/edit/(:segment)', 'Pinjam::edit/$1');
$routes->post('/pinjam/prosesedit', 'Pinjam::prosesedit');
$routes->get('/pinjam/return/(:segment)', 'Pinjam::return/$1');

$routes->get('/login', 'Login::index');
$routes->post('/login/proseslogin', 'Login::proseslogin');
$routes->get('/login/detach', 'Login::detach');

$routes->get('/barang/bulk-input', 'Barang::bulk-input');
$routes->post('/barang/proses-bulk-input', 'Barang::proses-bulk-input');

$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/generatepdf', 'Laporan::generatepdf');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
