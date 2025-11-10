<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Pengajar'; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { font-family: "Poppins", sans-serif; margin:0; background:#f0f8ff; color:#333; }

        header {
            background: linear-gradient(90deg,#1976d2,#42a5f5);
            color:white;
            padding:15px 25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            position:fixed;
            top:0; left:0; right:0;
            z-index:100;
        }

        header a { color:white; text-decoration:none; margin-left:15px; }
        header a:hover { text-decoration:underline; }

        .btn-logout {
            background:#ff4d4f; border:none; padding:6px 15px; border-radius:20px; color:white;
        }
        .btn-logout:hover { background:#d9363e; }

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
            display:block;
            padding:12px 20px;
            color:#333;
            text-decoration:none;
            border-left:3px solid transparent;
            transition: all 0.3s;
            font-weight:500;
        }
        .sidebar a:hover {
            background:#e3f2fd;
            border-left:3px solid #1976d2;
            color:#1976d2;
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
    <h1><i class="bi bi-person-badge-fill me-2"></i>Dashboard Pengajar</h1>
    <div class="d-flex align-items-center">
        <a href="<?= base_url('dashboard/profil') ?>"><i class="bi bi-person-circle me-1"></i><?= session()->get('username') ?></a>
        <a href="<?= base_url('logout') ?>" class="btn-logout"><i class="bi bi-box-arrow-right me-1"></i> Logout</a>
    </div>
</header>

<div class="sidebar">
    <a href="<?= base_url('dashboard/jadwal') ?>"><i class="bi bi-calendar2-fill me-2"></i>Kelola Jadwal</a>
    <a href="<?= base_url('dashboard/materi') ?>"><i class="bi bi-journal-text me-2"></i>Kelola Materi</a>
</div>

<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
