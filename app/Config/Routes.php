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
| Authentication (Login & Register)
|-------------------------------------------------------------------------- 
*/
$routes->group('', function ($routes) {
    $routes->get('register', 'Auth::register');
    $routes->post('register/save', 'Auth::saveRegister');

    $routes->get('login', 'Auth::login');
    $routes->post('login/process', 'Auth::processLogin');

    $routes->get('logout', 'Auth::logout');
});

/*
|--------------------------------------------------------------------------
| Dashboard (Role-Based)
|-------------------------------------------------------------------------- 
*/
$routes->group('dashboard', function ($routes) {

    $routes->get('/', 'Dashboard::index');

    // ADMIN
    $routes->get('admin', 'Dashboard::admin');
    $routes->group('admin', function ($routes) {
        $routes->get('kelola-akun', 'AdminController::kelolaAkun');
        $routes->get('detail-akun/(:num)', 'AdminController::detailAkun/$1');
        $routes->get('edit-akun/(:num)', 'AdminController::editAkun/$1');
        $routes->post('update-akun/(:num)', 'AdminController::updateAkun/$1');
        $routes->get('delete-akun/(:num)', 'AdminController::deleteAkun/$1');
    });

    // PENGAJAR
    $routes->get('pengajar', 'Dashboard::pengajar');
    $routes->get('materi', 'Dashboard::materi');

    // Materi Pengajar
    $routes->get('pengajar/materi', 'Materi::index');        // daftar materi  
    $routes->get('pengajar/materi/semua', 'Materi::index/all');

    $routes->get('pengajar/materi/tambah', 'Materi::tambah'); // form tambah materi
    $routes->post('pengajar/materi/simpan', 'Materi::simpan'); // simpan materi
    // Edit & Update
    $routes->get('pengajar/materi/edit/(:num)', 'Materi::edit/$1');
    $routes->post('pengajar/materi/update/(:num)', 'Materi::update/$1');
    $routes->get('pengajar/materi/hapus/(:num)', 'Materi::hapus/$1');

    $routes->get('jadwal', 'Dashboard::jadwal');
    $routes->get('pengajar/quiz', 'Pengajar::quiz');
    $routes->get('pengajar/banksoal', 'Pengajar::banksoal');
    $routes->get('/banksoal', 'Banksoal::index');

// ==================== BANKSOAL ====================
$routes->group('pengajar', function($routes){
    // Daftar banksoal pengajar
    $routes->get('banksoal', 'Banksoal::index');
    
    // Form tambah soal
    $routes->get('banksoal/tambah', 'Banksoal::create');
    
    // Simpan soal
    $routes->post('banksoal/simpan', 'Banksoal::store');
    
    // Edit soal
    $routes->get('banksoal/edit/(:num)', 'Banksoal::edit/$1');
    $routes->post('banksoal/update/(:num)', 'Banksoal::update/$1');
    
    // Hapus soal
    $routes->get('banksoal/hapus/(:num)', 'Banksoal::delete/$1');
});

});


    // PENERIMA
    $routes->get('dashboard/penerima', 'Dashboard::penerima');
    $routes->get('dashboard/penerima/mapel', 'Dashboard::daftarMapel');
    $routes->get('penerima', 'Dashboard::penerima');
    $routes->get('penerima/cari', 'Dashboard::cariMateri');
    $routes->get('penerima/mapel', 'Dashboard::daftarMapel');
    $routes->get('penerima/mapel/(:num)', 'Dashboard::detailMapel/$1');
    $routes->get('penghargaan', 'Penghargaan::index');
    $routes->get('dashboard/penerima/penghargaan', 'Penghargaan::index');

    // QUIZ
    $routes->group('quiz', function ($routes) {
        $routes->get('/', 'Quiz::index');
        $routes->get('start', 'Quiz::start');
        $routes->post('submit', 'Quiz::submit');
    });

    // FORUM
    $routes->group('forum', function ($routes) {
        $routes->get('/', 'Forum::index');
        $routes->get('topic/(:num)', 'Forum::topic/$1');
        $routes->post('addComment', 'Forum::addComment');
    });

    // PROFIL
    $routes->get('profil', 'Profil::index');


/*
|--------------------------------------------------------------------------
| Public Routes
|-------------------------------------------------------------------------- 
*/
$routes->get('penghargaan', 'Penghargaan::index');
$routes->get('dashboard/penerima/cari', 'Dashboard::cariMateri');
$routes->get('penerima/mapel/(:num)', 'Dashboard::detailMapel/$1');


//Forum
$routes->group('dashboard/forum', ['filter' => 'auth'], function($routes){
    $routes->get('', 'Forum::index');
    $routes->get('room/(:num)', 'Forum::room/$1');

    $routes->post('store', 'Forum::storePost');           // post admin
    $routes->post('storeComment', 'Forum::storeComment'); // komentar user
    $routes->get('deleteComment/(:num)', 'Forum::deleteComment/$1'); // hapus komentar
});




