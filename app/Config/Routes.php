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

    // Forum
    $routes->get('forum', 'Forum::index');
    $routes->get('forum/detail/(:num)', 'Forum::detail/$1');
    $routes->post('forum/komentar/(:num)', 'Forum::tambahKomentar/$1');
    $routes->get('forum/komentar/hapus/(:num)', 'Forum::hapusKomentar/$1');

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

    // =========================
    // PENGAJAR
    // =========================
    $routes->group('pengajar', function ($routes) {

        $routes->get('/', 'Dashboard::pengajar');

        // Materi
        $routes->get('materi', 'Materi::index');
        $routes->get('materi/semua', 'Materi::index/true');
        $routes->get('materi/tambah', 'Materi::tambah');
        $routes->post('materi/simpan', 'Materi::simpan');
        $routes->get('materi/edit/(:num)', 'Materi::edit/$1');
        $routes->post('materi/update/(:num)', 'Materi::update/$1');
        $routes->get('materi/hapus/(:num)', 'Materi::hapus/$1');

        // QUIZ
        $routes->get('quiz', 'Pengajar::quiz');
        $routes->get('quiz/tambah', 'Pengajar::tambah_quiz');
        $routes->post('quiz/simpan', 'Quiz::simpan');
        $routes->get('quiz/get-soal/(:num)', 'Pengajar::getSoal/$1');
        $routes->get('quiz/edit/(:num)', 'Pengajar::quizEdit/$1');
        $routes->post('quiz/update/(:num)', 'Pengajar::quizUpdate/$1');
        $routes->get('quiz/detail/(:num)', 'Pengajar::quizDetail/$1');
        $routes->get('quiz/hapus/(:num)', 'Pengajar::quizHapus/$1');

        // BANK SOAL
        $routes->get('banksoal', 'Banksoal::index');
        $routes->get('banksoal/tambah', 'Banksoal::create');
        $routes->post('banksoal/simpan', 'Banksoal::store');
        $routes->get('banksoal/detail/(:num)', 'Banksoal::detail/$1');
        $routes->get('banksoal/edit/(:num)', 'Banksoal::edit/$1');
        $routes->post('banksoal/update/(:num)', 'Banksoal::update/$1');
        $routes->get('banksoal/hapus/(:num)', 'Banksoal::hapus/$1');

        // SOAL DALAM BANK SOAL
        $routes->get('soal/tambah/(:num)', 'Soal::create/$1');  
        $routes->post('soal/simpan/(:num)', 'Soal::store/$1');
        $routes->get('soal/edit/(:num)', 'Soal::edit/$1');      
        $routes->post('soal/update/(:num)', 'Soal::update/$1');
        $routes->get('soal/delete/(:num)', 'Soal::delete/$1');
    });

    // =========================
    // PENERIMA
    // =========================
    $routes->group('penerima', function ($routes) {

        $routes->get('/', 'Dashboard::penerima');

        // PERBAIKAN PENTING: Tambahkan 'Penerima\' karena file ada di subfolder
        $routes->get('cari', 'Mapel::cari');

        // Kategori Mapel
        $routes->get('mapel', 'Dashboard::daftarMapel');
        $routes->get('mapel/(:num)', 'Dashboard::detailMapel/$1');
        $routes->get('materi/(:num)', 'Dashboard::detailMateri/$1');
        $routes->get('cari', 'PenerimaController::cari');
        
        // Quiz Penerima
        // URL akses: localhost:8080/dashboard/penerima/quiz
        $routes->group('quiz', function($routes){
            $routes->get('/', 'Dashboard::daftarQuizPenerima');
            $routes->get('(:num)', 'Dashboard::detailQuizPenerima/$1'); // URL: quiz/1
            $routes->get('mulai/(:num)', 'Dashboard::mulaiQuiz/$1');
            $routes->post('kumpul/(:num)', 'Dashboard::kumpulkanJawaban/$1');
        });

        $routes->get('penghargaan', 'Penghargaan::index');
    });

    // Profil
    $routes->get('profil', 'Profil::index');
    $routes->get('profil/edit', 'Profil::edit');
    $routes->post('profil/update', 'Profil::update');

    // Profil Pengajar
    $routes->get('pengajar/profil', 'Profil::index');
    $routes->get('pengajar/profil/edit', 'Profil::edit');
    $routes->post('pengajar/profil/update', 'Profil::update');


});
