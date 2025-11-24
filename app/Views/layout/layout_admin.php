<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Admin'; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #e8f5e9);
            margin: 0;
            color: #333;
        }
        header {
            background: linear-gradient(90deg, #0d47a1, #1976d2);
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }
        header h1 { font-size: 22px; font-weight: 600; }
        .btn-logout {
            background: #ff4d4f;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-logout:hover { background: #d9363e; }
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
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: #e3f2fd;
            color: #1976d2;
        }
        .content {
            margin-left: 240px;
            margin-top: 90px;
            padding: 25px;
        }
    </style>
</head>
<body>

<header>
    <div>
        <h1><i class="bi bi-shield-lock-fill me-2"></i> Dashboard Admin</h1>
    </div>
    <div class="d-flex align-items-center">
        <span class="me-3 fw-semibold">
            <i class="bi bi-person-circle me-1"></i>
            <?= session()->get('username') ?>
        </span>
        <a href="<?= base_url('logout') ?>" class="btn-logout">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>
</header>

<div class="sidebar">
    <a href="<?= base_url('dashboard/admin') ?>"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="<?= base_url('dashboard/admin/kelola-akun') ?>"><i class="bi bi-people-fill me-2"></i> Kelola Akun</a>
    <a href="<?= base_url('dashboard/admin/kelola-forum') ?>"><i class="bi bi-chat-text-fill me-2"></i> Kelola Forum</a>
</div>

<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
