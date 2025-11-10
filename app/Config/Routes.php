<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$routes->group('', function ($routes) {
    // Register
    $routes->get('register', 'Auth::register');
    $routes->post('register/save', 'Auth::saveRegister');

    // Login & Logout
    $routes->get('login', 'Auth::login');
    $routes->post('login/process', 'Auth::processLogin');
    $routes->get('logout', 'Auth::logout');
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes (Role-Agnostic & Role-Specific)
|--------------------------------------------------------------------------
*/
$routes->group('dashboard', function ($routes) {

    // Halaman utama dashboard (role-agnostic)
    $routes->get('/', 'Dashboard::index');

    /*
    |----------------------------------------------------------------------
    | Admin
    |----------------------------------------------------------------------
    */
    $routes->get('admin', 'Dashboard::admin');

    $routes->get('admin/kelola-akun', 'AdminController::kelolaAkun');
    $routes->get('admin/detail-akun/(:num)', 'AdminController::detailAkun/$1');
    $routes->get('admin/edit-akun/(:num)', 'AdminController::editAkun/$1');
    $routes->post('admin/update-akun/(:num)', 'AdminController::updateAkun/$1');
    $routes->get('admin/delete-akun/(:num)', 'AdminController::deleteAkun/$1');


    /*
    |----------------------------------------------------------------------
    | Pengajar
    |----------------------------------------------------------------------
    */
    $routes->get('pengajar', 'Dashboard::pengajar');
    $routes->get('materi', 'Dashboard::materi');   // Kelola materi pengajar
    $routes->get('jadwal', 'Dashboard::jadwal');   // Kelola jadwal pengajar

    /*
    |----------------------------------------------------------------------
    | Quiz
    |----------------------------------------------------------------------
    */
    $routes->get('quiz', 'Quiz::index');
    $routes->get('quiz/start', 'Quiz::start');
    $routes->post('quiz/submit', 'Quiz::submit');

    /*
    |----------------------------------------------------------------------
    | Forum
    |----------------------------------------------------------------------
    */
    $routes->get('forum', 'Forum::index');
    $routes->get('forum/topic/(:num)', 'Forum::topic/$1');
    $routes->post('forum/addComment', 'Forum::addComment');

    /*
    |----------------------------------------------------------------------
    | Penghargaan (hanya dashboard)
    |----------------------------------------------------------------------
    */
    $routes->get('penghargaan', 'Penghargaan::index');

    /*
    |----------------------------------------------------------------------
    | Profil
    |----------------------------------------------------------------------
    */
    $routes->get('profil', 'Profil::index');
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
$routes->get('penghargaan', 'Penghargaan::index');
