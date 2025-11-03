<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Langkah Peduli</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    /* Navbar */
    .navbar {
      background-color: #0078d7;
    }

    .navbar-brand {
      color: white !important;
      font-weight: bold;
    }

    .navbar-nav .nav-link {
      color: white !important;
    }

    .btn-profile {
      background-color: white;
      color: #0078d7;
      font-weight: 500;
      border-radius: 20px;
      padding: 5px 15px;
    }

    .btn-profile:hover {
      background-color: #e6f0ff;
    }

    /* Sidebar */
    .sidebar {
      width: 230px;
      height: 100vh;
      background: #ffffff;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 56px; /* tinggi navbar */
      left: 0;
      padding-top: 20px;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #0078d7;
      font-weight: 500;
      text-decoration: none;
      border-left: 4px solid transparent;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #e8f3ff;
      border-left: 4px solid #0078d7;
    }

    /* Konten utama */
    .content {
      margin-left: 250px;
      padding: 30px;
    }

    .content h1 {
      color: #0078d7;
      margin-bottom: 20px;
    }

    .card {
      border: none;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="<?= base_url('/dashboard') ?>">Langkah Peduli</a>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari materi..." aria-label="Search">
          <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
      <div class="me-3">
        <a href="<?= base_url('/profil') ?>" class="btn btn-profile"><i class="bi bi-person-circle me-1"></i> Cek Profil</a>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#"><i class="bi bi-award-fill me-2"></i> Cek Penghargaan</a>
    <a href="#"><i class="bi bi-question-circle-fill me-2"></i> Quiz</a>
    <a href="#"><i class="bi bi-chat-dots-fill me-2"></i> Forum</a>
    <a href="#"><i class="bi bi-box-arrow-right me-2"></i> Keluar Forum</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h1>Selamat Datang di Dashboard 🎉</h1>
    <p>Jelajahi fitur-fitur di Langkah Peduli:</p>

    <div class="row g-4 mt-3">
      <div class="col-md-4">
        <div class="card p-3">
          <h5><i class="bi bi-award-fill text-primary me-2"></i> Cek Penghargaan</h5>
          <p class="text-muted">Lihat prestasi dan penghargaan yang sudah kamu raih selama belajar dan beraksi sosial.</p>
          <button class="btn btn-outline-primary w-100">Lihat Sekarang</button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3">
          <h5><i class="bi bi-question-circle-fill text-primary me-2"></i> Quiz</h5>
          <p class="text-muted">Uji pengetahuanmu melalui quiz interaktif dan dapatkan skor terbaikmu!</p>
          <button class="btn btn-outline-primary w-100">Mulai Quiz</button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3">
          <h5><i class="bi bi-chat-dots-fill text-primary me-2"></i> Forum</h5>
          <p class="text-muted">Bergabunglah dalam forum diskusi, berbagi ide, dan belajar dari orang lain.</p>
          <button class="btn btn-outline-primary w-100">Masuk Forum</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
