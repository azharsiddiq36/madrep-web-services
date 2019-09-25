<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['dashboard_admin'] = 'Welcome/dashboard_admin';
$route['dashboard'] = 'Welcome/dashboard';
//pegawai
$route['daftar_pegawai'] = 'PegawaiController/index';
$route['tambah_pegawai'] = 'PegawaiController/add_pegawai';
$route['add_pegawai']= 'PegawaiController/post';
//napi
$route['tambah_narapidana'] = 'NapiController/add_napi';
$route['add_napi'] = 'NapiController/post';
$route['daftar_narapidana'] = 'NapiController/index';

//penjamin
$route['daftar_penjamin'] = 'PenjaminController/index';
$route['daftar_pengajuan_penjamin'] = 'PenjaminController/index';

$route['tambah_penjamin'] = 'PenjaminController/post';
//pengguna
$route['daftar_pengguna'] = 'PenggunaController/index';
$route['add_pengguna'] = 'PenggunaController/add_pengguna';

//pengguna
$route['post_pengguna'] = 'PenggunaController/post';
$route['login'] = 'AuthController/loginAction';
$route['profile'] = 'AuthController/profile';
$route['ubah_password'] = 'AuthController/ubah_password';
$route['iseng'] = 'Welcome/test';
$route['logout'] = 'Welcome/logout';
$route['welcome'] = 'Welcome/index';

//dokter
$route['daftar_dokter'] = 'DokterController/index';
$route['tambah_dokter'] = 'DokterController/post';
$route['dokter_rincian/(:any)'] = 'DokterController/rincian/$1';

//madrep
$route['daftar_madrep'] = 'MadrepController/index';
$route['tambah_madrep'] = 'MadrepController/post';
$route['madrep_rincian/(:any)'] = 'MadrepController/rincian/$1';

//obat
$route['daftar_obat'] = 'ObatController/index';
$route['tambah_obat'] = 'ObatController/post';
$route['obat_rincian/(:any)'] = 'ObatController/rincian/$1';
$route['obat_edit/(:any)'] = 'ObatController/edit/$1';
//kategori
$route['daftar_kategori'] = 'KategoriController/index';
$route['tambah_kategori'] = 'KategoriController/post';
$route['kategori_edit/(:any)'] = 'KategoriController/edit/$1';
//kunjungan
$route['daftar_kunjungan'] = 'KunjunganController/index';
//lokasi_absen
$route['daftar_lokasi_absen'] = 'LokasiAbsenController/index';
$route['tambah_lokasi_absen'] = 'LokasiAbsenController/post';
$route['lokasi_absen_edit/(:any)'] = 'LokasiAbsenController/edit/$1';
//Absen
$route['daftar_absen'] = 'AbsensiController/index';
//ajax
$route['ajx_pengantar'] = 'BimbinganController/ajx_surat';
$route['riwayatbimbingan'] = 'BimbinganController/riwayat';
$route['ajx_detail_napi'] = 'NapiController/detailNapiAjx';

$route['translate_uri_dashes'] = FALSE;