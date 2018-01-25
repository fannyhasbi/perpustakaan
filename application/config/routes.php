<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User
$route['login'] = 'user/login';
$route['logout']= 'user/logout';
$route['daftar']= 'user/daftar';
$route['user/(:any)'] = 'search/user/$1';
$route['setting'] = 'user/setting';

//Buku
$route['buku'] = 'buku';
$route['buku/(:any)']  = 'buku/items/$1';
$route['pinjam/buku/(:any)'] = 'buku/proses_pinjam/$1';
$route['pinjam/(:any)']= 'buku/pinjam/$1';

//Peminjaman
$route['peminjaman/riwayat'] = 'peminjaman/riwayat';
$route['peminjaman/kembali/(:any)'] = 'peminjaman/kembali/$1';

//Administrator
$route['admin'] = 'user/login_admin';
$route['admin/logout'] = 'admin/logout';
$route['admin/setting']= 'admin/setting';
$route['admin/buku'] = 'admin/buku';
$route['admin/buku/tambah'] = 'admin/tambah_buku';
$route['admin/anggota'] = 'admin/anggota';
$route['admin/anggota/(:any)'] = 'admin/detail_anggota/$1';
$route['admin/edit/buku/(:any)'] = 'admin/edit_buku/$1';
$route['admin/hapus/buku/(:any)']= 'admin/hapus_buku/$1';
$route['admin/edit/anggota/(:any)'] = 'admin/edit_anggota/$1';
$route['admin/hapus/anggota/(:any)']= 'admin/hapus_anggota/$1';
$route['admin/aktif/anggota/(:any)']= 'admin/aktif_anggota/$1';
$route['admin/peminjaman/(:any)'] = 'admin/peminjaman/$1';

//default
$route['default_controller'] = 'home';
$route['(:any)'] = 'home/notfound';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;