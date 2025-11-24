<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/* Home */
$routes->get('/', 'Home::index');

/* Auth */
$routes->group('', function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login/process', 'Auth::processLogin');

    $routes->get('register', 'Auth::register');
    $routes->post('register/save', 'Auth::saveRegister');

    $routes->get('logout', 'Auth::logout');
});

/* Dashboard */
$routes->group('dashboard', function ($routes) {

    // Dashboard umum
    $routes->get('/', 'Dashboard::index');

    // =========================
    // ADMIN
    // =========================
    $routes->group('admin', function ($routes) {
        $routes->get('/', 'Dashboard::admin');

        // Kelola Akun
        $routes->get('kelola-akun', 'AdminController::kelolaAkun');
        $routes->get('detail-akun/(:num)', 'AdminController::detailAkun/$1');
        $routes->get('edit-akun/(:num)', 'AdminController::editAkun/$1');
        $routes->post('update-akun/(:num)', 'AdminController::updateAkun/$1');
        $routes->get('delete-akun/(:num)', 'AdminController::deleteAkun/$1');

        // Kelola Forum
        $routes->get('kelola-forum', 'ForumController::kelolaForum');
        $routes->get('tambah-forum', 'ForumController::tambahForum');
        $routes->post('simpan-forum', 'ForumController::simpanForum');
        $routes->get('edit-forum/(:num)', 'ForumController::editForum/$1');
        $routes->post('update-forum/(:num)', 'ForumController::updateForum/$1');
        $routes->get('hapus-forum/(:num)', 'ForumController::hapusForum/$1');
    });

$routes->group('pengajar', function ($routes) {
    $routes->get('/', 'Dashboard::pengajar');

    // FIX RUTE INI
    $routes->get('materi/semua', 'Materi::index/true');

    $routes->get('materi', 'Materi::index');

    $routes->get('materi/tambah', 'Materi::tambah');
    $routes->post('materi/simpan', 'Materi::simpan');

    $routes->get('materi/edit/(:num)', 'Materi::edit/$1');
    $routes->post('materi/update/(:num)', 'Materi::update/$1');

    $routes->get('materi/hapus/(:num)', 'Materi::hapus/$1');





    // Quiz
    $routes->get('quiz', 'Pengajar::quiz');

    // Bank soal
      // Bank soal
    $routes->get('banksoal', 'Banksoal::index');                  // List bank soal
    $routes->get('banksoal/tambah', 'Banksoal::create');          // Form tambah bank soal
    $routes->post('banksoal/simpan', 'Banksoal::store');          // Simpan bank soal

$routes->get('banksoal/detail/(:num)', 'Banksoal::detail/$1');
    $routes->get('soal/(:num)', 'Soal::create/$1');               // Tambah soal baru untuk bank soal tertentu
    $routes->post('soal/simpan/(:num)', 'Soal::store/$1');        // Simpan soal

    $routes->get('banksoal/edit/(:num)', 'Banksoal::edit/$1');    // Edit bank soal
    $routes->post('banksoal/update/(:num)', 'Banksoal::update/$1');// Update bank soal
    $routes->get('banksoal/hapus/(:num)', 'Banksoal::delete/$1'); // Hapus bank soal

   $routes->get('soal/tambah/(:num)', 'Soal::create/$1');  // <- id_banksoal
    $routes->post('soal/simpan/(:num)', 'Soal::store/$1');  // <- id_banksoal

    // Edit & delete soal
    $routes->get('soal/edit/(:num)', 'Soal::edit/$1');
    $routes->post('soal/update/(:num)', 'Soal::update/$1');
    $routes->get('soal/delete/(:num)', 'Soal::delete/$1');
});
    // =========================
// PENERIMA
// =========================
$routes->group('penerima', function ($routes) {

    $routes->get('/', 'Dashboard::penerima');
    $routes->get('mapel', 'Dashboard::daftarMapel');
    $routes->get('cari', 'Dashboard::cariMateri');
    $routes->get('mapel/(:num)', 'Dashboard::detailMapel/$1');
    $routes->get('penghargaan', 'Penghargaan::index');

    // Forum
    $routes->get('forum', 'Forum::index');
    $routes->get('forum/detail/(:num)', 'Forum::detail/$1');
    $routes->post('forum/komentar/(:num)', 'Forum::tambahKomentar/$1');
});



    // =========================
    // QUIZ umum
    // =========================
    $routes->group('quiz', function ($routes) {
        $routes->get('/', 'Quiz::index');
        $routes->get('start', 'Quiz::start');
        $routes->post('submit', 'Quiz::submit');
    });

    // Profil
    $routes->get('profil', 'Profil::index');
});
