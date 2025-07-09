<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true); // aktifkan agar bisa pakai dash -> camelCase
$routes->set404Override();
// Auto Routing Improved aman digunakan jika controller dan method ditulis sesuai standar
$routes->setAutoRoute(false);

// Route manual
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('admin', 'Admin::index');
$routes->get('auth', 'Auth::index');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');

$routes->get('PaketWisata', 'PaketWisata::index');
$routes->get('paket-wisata', 'PaketWisata::index');
$routes->post('paket-wisata', 'PaketWisata::store');
$routes->post('paket-wisata/edit/(:num)', 'PaketWisata::update/$1');
$routes->get('paket-wisata/delete/(:num)', 'PaketWisata::delete/$1');
$routes->get('/paket-wisata/edit/(:num)', 'PaketWisata::edit/$1');
$routes->post('/paket-wisata/update/(:num)', 'PaketWisata::update/$1');

$routes->get('/Admin', 'Admin::index');

$routes->get('galeri', 'Galeri::index');
$routes->post('galeri/store', 'Galeri::store');
$routes->post('galeri/update/(:num)', 'Galeri::update/$1');
$routes->get('galeri/delete/(:num)', 'Galeri::delete/$1');

$routes->get('galeri/edit/(:num)', 'Galeri::edit/$1');
$routes->post('galeri/update/(:num)', 'Galeri::update/$1');

$routes->get('video', 'Video::index');
$routes->post('video/store', 'Video::store');
$routes->get('video/delete/(:num)', 'Video::delete/$1');
$routes->get('video/edit/(:num)', 'Video::edit/$1');
$routes->post('video/update/(:num)', 'Video::update/$1');

$routes->get('/berita', 'Berita::index');
$routes->post('/berita', 'Berita::store');
$routes->get('/berita/edit/(:num)', 'Berita::edit/$1');
$routes->post('/berita/update/(:num)', 'Berita::update/$1');
$routes->get('/berita/delete/(:num)', 'Berita::delete/$1');

$routes->get('pemesanan', 'Pemesanan::index');
$routes->get('pemesanan/export_excel', 'Pemesanan::export_excel');
$routes->get('pemesanan/export_pdf', 'Pemesanan::export_pdf');

$routes->get('pembayaran', 'Pembayaran::index');
$routes->get('pembayaran/verifikasi/(:num)', 'Pembayaran::verifikasi/$1');
$routes->get('pembayaran/gagal/(:num)', 'Pembayaran::gagal/$1');
$routes->get('pembayaran/hapus/(:num)', 'Pembayaran::hapus/$1');

$routes->get('laporan', 'Pembayaran::laporan');
$routes->post('laporan/filter', 'Pembayaran::filter');
$routes->get('laporan/excel', 'Pembayaran::exportExcel');
$routes->get('laporan/pdf', 'Pembayaran::exportPDF');

$routes->get('pemesanan/form/(:num)', 'Pemesanan::form/$1');
$routes->post('pemesanan/simpan', 'Pemesanan::simpan');

$routes->get('home/pembayaran/(:num)', 'Home::pembayaran/$1');
$routes->post('home/simpanPembayaran', 'Home::simpanPembayaran');

$routes->get('admin/exportPembayaran', 'Admin::exportPembayaran');

$routes->get('laporan', 'Laporan::index');
$routes->post('laporan/filter', 'Laporan::filter');
$routes->post('laporan/pdf', 'Laporan::pdf');
$routes->post('laporan/excel', 'Laporan::excel');

$routes->get('home/autocomplete', 'Home::autocomplete');

$routes->get('auth/logout', 'Auth::logout');

$routes->get('auth/register', 'Auth::register');
$routes->post('auth/simpan_register', 'Auth::simpan_register');

$routes->get('berita/detail/(:num)', 'Berita::detail/$1');

$routes->get('pesanan-saya', 'Home::pesananSaya'); // jika dari Home controller
$routes->get('/login', 'Auth::login');

$routes->get('paket', 'Paket::index');

$routes->get('privacy/delete-data', 'Home::deleteData');

$routes->get('auth/google', 'Auth::loginGoogle');
$routes->get('auth/googleCallback', 'Auth::googleCallback');

$routes->match(['get', 'post'], 'laporan/filter', 'Laporan::filter');
$routes->match(['get', 'post'], 'laporan/pdf', 'Laporan::pdf');
