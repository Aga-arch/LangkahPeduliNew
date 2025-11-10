<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
            margin: 0;
            color: #333;
        }

        /* ===== HEADER ===== */
        header {
            background: linear-gradient(90deg, #0078d7, #00bcd4);
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 22px;
            font-weight: 600;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-left: 15px;
            transition: 0.3s;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Logout button */
        .btn-logout {
            background: #ff4d4f;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #d9363e;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 220px;
            height: calc(100vh - 70px);
            background: white;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background: #f0f8ff;
            border-left: 3px solid #0078d7;
            color: #0078d7;
        }

        /* ===== SEARCH BAR ===== */
        .menu-top {
            position: fixed;
            top: 70px;
            left: 220px;
            right: 0;
            background: white;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            z-index: 90;
        }

        .search-bar {
            width: 50%;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1.5px solid #0078d7;
            border-radius: 25px;
            outline: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .search-bar input:focus {
            box-shadow: 0 0 8px rgba(0,120,215,0.3);
        }

        .search-bar i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #0078d7;
        }

        /* ===== CONTENT ===== */
        .content {
            margin-left: 240px;
            margin-top: 130px;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0,0,0,0.12);
        }
    </style>
</head>
<body>

<header>
    <div>
        <h1><i class="bi bi-lightbulb-fill me-2"></i>Langkah Peduli Dashboard</h1>
    </div>
    <div class="d-flex align-items-center">
        <!-- Klik username untuk buka profil -->
        <a href="<?= base_url('dashboard/profil') ?>" class="me-3 text-decoration-none fw-semibold">
            <i class="bi bi-person-circle me-1"></i>
            <?= session()->get('username') ?? 'admin' ?>
        </a>

        <!-- Tombol Logout -->
        <a href="<?= base_url('logout') ?>" class="btn-logout">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>
</header>

<!-- Sidebar -->
<div class="sidebar">
    <a href="<?= base_url('dashboard/penghargaan') ?>"><i class="bi bi-trophy me-2"></i> Penghargaan</a>
    <a href="<?= base_url('dashboard/quiz') ?>"><i class="bi bi-question-circle me-2"></i> Quiz</a>
    <a href="<?= base_url('dashboard/forum') ?>"><i class="bi bi-chat-dots me-2"></i> Forum</a>
</div>

<!-- Search bar -->
<div class="menu-top">
    <form action="<?= base_url('dashboard/cariMateri') ?>" method="get" class="search-bar">
        <input type="text" name="q" placeholder="Cari materi pembelajaran..." />
        <i class="bi bi-search"></i>
    </form>
</div>

<!-- Konten -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
