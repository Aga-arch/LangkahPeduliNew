<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth routes
$routes->get('/register', 'Auth::register');
$routes->post('/save-register', 'Auth::saveRegister');
$routes->get('/login', 'Auth::login');
$routes->post('/auth-login', 'Auth::authLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');
