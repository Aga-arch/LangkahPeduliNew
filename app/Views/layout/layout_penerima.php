<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Dashboard Penerima') ?></title>

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
      /* Tambahan padding bawah agar tidak tertutup footer */
      padding-bottom: 60px; 
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    footer {
      text-align: center;
      color: #666;
      padding: 20px 0;
      font-size: 14px;
      background-color: #fff; /* Tambahkan background agar rapi */
      margin-top: auto;
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

      .navbar-brand span {
        display: none;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">

      <a class="navbar-brand" href="<?= base_url('dashboard/penerima') ?>">
        <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Logo">
        <span>Langkah Peduli</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
             <li class="nav-item">
                <a href="<?= base_url('dashboard/forum') ?>" class="nav-link">
                    <i class="bi bi-chat-dots"></i> Forum
                </a>
             </li>

             <li class="nav-item">
                <a href="<?= base_url('dashboard/penerima/quiz') ?>" class="nav-link">
                    <i class="bi bi-question-circle"></i> Quiz
                </a>
             </li>
          </ul>

          <form action="<?= base_url('dashboard/penerima/cari') ?>" method="get" class="d-flex search-bar mx-auto">
            <input type="text" name="keyword" class="form-control" placeholder="Cari mata pelajaran..." required>
          </form>

          <div class="dropdown ms-lg-3">
            <div class="profile dropdown-toggle" style="cursor: pointer;" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle fs-4 text-primary align-middle"></i>
              <span class="ms-1 fw-bold text-dark"><?= esc(session()->get('username') ?? 'User') ?></span>
            </div>

            <ul class="dropdown-menu dropdown-menu-end mt-2">
              <li>
                <a class="dropdown-item" href="<?= base_url('profil') ?>">
                  <i class="bi bi-person me-2"></i> Profil Saya
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">
                  <i class="bi bi-box-arrow-right me-2"></i> Keluar
                </a>
              </li>
            </ul>
          </div>
      </div>

    </div>
  </nav>

  <div class="container content">
    <?= $this->renderSection('content') ?>
  </div>

  <footer>
    <div class="container">
        <p class="mb-0">&copy; <?= date('Y') ?> <span>Langkah Peduli</span>. Semua hak dilindungi.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>