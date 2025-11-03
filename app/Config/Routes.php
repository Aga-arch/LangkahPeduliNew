<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// app/Config/Routes.php — tambahkan / pastikan baris ini ada
$routes->get('/', 'Home::index');
// Halaman login
$routes->get('login', 'Auth::login');

// Proses login (POST)
$routes->post('login/process', 'Auth::processLogin');

// Logout
$routes->get('logout', 'Auth::logout');

// Auth / login (opsional)
$routes->get('login', 'Auth::login');
$routes->post('auth/processLogin', 'Auth::processLogin');
$routes->get('register', 'Auth::register');
$routes->post('auth/processRegister', 'Auth::processRegister');
$routes->get('logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('dashboard/penghargaan', 'Dashboard::penghargaan');
$routes->get('dashboard/quiz', 'Dashboard::quiz');
$routes->get('dashboard/forum', 'Dashboard::forum');
$routes->get('dashboard/materi', 'Dashboard::materi');
$routes->get('/penghargaan', 'Penghargaan::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('dashboard/penghargaan', 'Dashboard::penghargaan');
$routes->get('dashboard/forum', 'Dashboard::forum');

$routes->get('quiz', 'Quiz::index');
$routes->get('quiz/start', 'Quiz::start');
$routes->post('quiz/submit', 'Quiz::submit');
$routes->get('quiz/review/(:num)', 'Quiz::review/$1');


