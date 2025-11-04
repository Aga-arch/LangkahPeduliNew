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
// Quiz
$routes->get('quiz', 'Quiz::index');
$routes->get('quiz/start', 'Quiz::start');
$routes->post('quiz/submit', 'Quiz::submit');
$routes->get('quiz/review/(:num)', 'Quiz::review/$1');

// Forum
$routes->get('forum', 'Forum::index');
$routes->get('forum/topic/(:num)', 'Forum::topic/$1');
$routes->post('forum/comment', 'Forum::addComment');

// Penghargaan
$routes->get('penghargaan', 'Penghargaan::index');
