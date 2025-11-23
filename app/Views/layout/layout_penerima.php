<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Dashboard Penerima') ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6fb;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
    }

    .navbar {
      background: #ffffff;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
      padding: 12px 25px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .navbar-brand {
      font-weight: 700;
      color: #4f46e5 !important;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar-brand img {
      width: 30px;
      height: 30px;
    }

    .nav-link {
      font-weight: 500;
      margin-right: 15px;
      color: #4f46e5 !important;
    }

    .nav-link:hover {
      text-decoration: underline;
    }

    .search-bar input {
      border-radius: 50px;
      padding: 10px 15px;
      border: 1px solid #dcdcdc;
      background-color: #f9f9f9;
      transition: 0.3s;
    }

    .search-bar input:focus {
      border-color: #4f46e5;
      background: #fff;
      box-shadow: 0 0 8px rgba(79, 70, 229, 0.3);
      outline: none;
    }

    .content {
      margin-top: 100px;
      animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    footer {
      text-align: center;
      color: #666;
      padding: 20px 0;
      font-size: 14px;
    }

    footer span {
      color: #4f46e5;
      font-weight: 500;
    }

    @media (max-width: 768px) {
      .search-bar {
        width: 100%;
        margin: 10px 0;
      }
      .navbar-brand span { display: none; }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand" href="<?= base_url('dashboard/penerima') ?>">
      <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Logo">
      <span>Langkah Peduli</span>
    </a>

    <!-- Menu Forum -->
    <a href="<?= base_url('dashboard/penerima/forum') ?>" class="nav-link">
      <i class="bi bi-chat-dots"></i> Forum
    </a>

    <!-- Search -->
    <form action="<?= base_url('dashboard/penerima/cari') ?>" method="get" class="d-flex search-bar mx-auto">
      <input type="text" name="keyword" class="form-control" placeholder="Cari mata pelajaran..." required>
    </form>

    <!-- Profil -->
    <div class="dropdown">
      <div class="profile dropdown-toggle" data-bs-toggle="dropdown">
        <i class="bi bi-person-circle"></i>
        <span><?= esc(session()->get('username') ?? 'User') ?></span>
      </div>
      <ul class="dropdown-menu dropdown-menu-end mt-2">
        <li><a class="dropdown-item" href="<?= base_url('dashboard/profil') ?>"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
        <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Halaman -->
<div class="container content">
  <?= $this->renderSection('content') ?>
</div>

<footer>
  <p>&copy; <?= date('Y') ?> <span>Langkah Peduli</span>. Semua hak dilindungi.</p>
</footer>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
