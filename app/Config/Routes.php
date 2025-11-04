<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Register
$routes->get('register', 'Auth::register');
$routes->post('register/save', 'Auth::saveRegister');

// Login
$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::processLogin');

// Logout
$routes->get('logout', 'Auth::logout');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');
$routes->get('/dashboard/quiz', 'Quiz::index');
$routes->get('/dashboard/quiz/start', 'Quiz::start');
$routes->post('/dashboard/quiz/submit', 'Quiz::submit');

$routes->get('/penghargaan', 'Penghargaan::index');
$routes->get('/dashboard/penghargaan', 'Penghargaan::index');

$routes->get('/dashboard/forum', 'Forum::index');
$routes->get('/dashboard/forum/topic/(:num)', 'Forum::topic/$1');
$routes->post('/dashboard/forum/addComment', 'Forum::addComment');

$routes->get('/dashboard/profil', 'Profil::index');





