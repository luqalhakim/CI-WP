<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// karyawan baru routes
$routes->get('karyawanbaru', 'Home::karyawanbaru');
$routes->get('createkaryawan', 'Home::createkaryawan');
$routes->post('storekaryawan', 'Home::storekaryawan');
$routes->get('editkaryawan/(:num)', 'Home::editkaryawan/$1');
$routes->post('updateKaryawan/(:num)', 'Home::updateKaryawan/$1');
$routes->get('deleteKaryawan/(:num)', 'Home::deleteKaryawan/$1');

// 

$routes->get('datakriteria', 'Home::datakriteria');
$routes->get('penilaiankaryawan', 'Home::penilaiankaryawan');
$routes->get('vektorsv', 'Home::vektor_s_v');
$routes->get('perangkingan', 'Home::perangkingan');
$routes->get('hasilkeputusan', 'Home::hasilkeputusan');
