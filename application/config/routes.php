<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['login']             = 'backend/AuthController/login';
$route['logout']            = 'backend/AuthController/logout';
$route['dash'] = 'backend/HomeController/index';
// Routing Admin
$route['admin']                     = 'backend/AdminController/index';
$route['admin/create']              = 'backend/AdminController/create';
$route['admin/update/(:num)']       = 'backend/AdminController/edit/$1';
// Routing Admin
$route['level']                     = 'backend/LevelController/index';
$route['level/create']              = 'backend/LevelController/create';
$route['level/update/(:num)']       = 'backend/LevelController/edit/$1';


// Routing Surat Keluar
$route['pembangunan-jalan']                      = 'backend/JalanController/index';
$route['pembangunan-jalan/create']               = 'backend/JalanController/create';
$route['pembangunan-jalan/edit/(:num)']          = 'backend/JalanController/update/$1';
$route['pembangunan-jalan/delete/(:any)']        = 'backend/JalanController/destroy/$1';


$route['get-kelurahan-by-kecamatan/(:num)']       = 'backend/JalanController/get_kelurahan/$1';
$route['get-grafik-tahun/(:num)']                 = 'backend/JalanController/get_grafik/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
