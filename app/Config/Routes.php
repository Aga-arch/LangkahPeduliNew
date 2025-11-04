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
