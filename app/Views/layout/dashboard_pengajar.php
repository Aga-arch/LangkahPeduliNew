<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'Dashboard Pengajar'; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
/* ================= THEME VARIABLE ================= */
:root {
    --bg-main:#0f172a;
    --bg-header:#1e293b;
    --bg-sidebar:#020617;
    --bg-card:#020617;
    --text-main:#e5e7eb;
    --text-muted:#94a3b8;
    --accent:#3b82f6;
}

body.light {
    --bg-main:#f8fafc;
    --bg-header:#ffffff;
    --bg-sidebar:#f1f5f9;
    --bg-card:#ffffff;
    --text-main:#0f172a;
    --text-muted:#64748b;
    --accent:#2563eb;
}

/* ================= BASE ================= */
body {
    font-family:"Poppins",sans-serif;
    margin:0;
    background:var(--bg-main);
    color:var(--text-main);
    transition:.3s;
}

/* ================= HEADER ================= */
header {
    background:var(--bg-header);
    padding:14px 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:fixed;
    top:0;left:0;right:0;
    z-index:100;
    box-shadow:0 2px 8px rgba(0,0,0,.2);
}

.logo-area {
    display:flex;
    align-items:center;
}

.logo-area img {
    height:48px;
    margin-right:12px;
}

header h1 {
    font-size:18px;
    margin:0;
}

header a {
    color:var(--text-main);
    text-decoration:none;
    margin-left:16px;
    font-size:14px;
}

header a:hover {
    color:var(--accent);
}

/* ================= TOGGLE BUTTON ================= */
.theme-btn {
    background:none;
    border:1px solid var(--accent);
    color:var(--accent);
    border-radius:6px;
    padding:5px 10px;
    font-size:14px;
    margin-left:12px;
}

.theme-btn:hover {
    background:var(--accent);
    color:white;
}

/* ================= SIDEBAR ================= */
.sidebar {
    position:fixed;
    top:70px;
    left:0;
    width:220px;
    height:calc(100vh - 70px);
    background:var(--bg-sidebar);
    padding-top:16px;
}

.sidebar a {
    display:block;
    padding:12px 20px;
    color:var(--text-main);
    text-decoration:none;
    font-weight:500;
    font-size:14px;
    border-left: 3px solid transparent;
    transition: .3s;
}

.sidebar a:hover,
.sidebar a.active {
    background:rgba(59,130,246,.15);
    color:var(--accent);
    border-left: 3px solid var(--accent);
}

/* ================= CONTENT ================= */
.content {
    margin-left:240px;
    margin-top:90px;
    padding:24px;
}

/* ================= CARD ================= */
.card {
    background:var(--bg-card);
    border:none;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,.2);
}

.text-muted {
    color:var(--text-muted)!important;
}

/* ================= BUTTON ================= */
.btn-primary {
    background:var(--accent);
    border:none;
}

.btn-primary:hover {
    opacity:.9;
}
</style>
</head>
<body>

<!-- ================= HEADER ================= -->
<header>
    <div class="logo-area">
        <img src="<?= base_url('images/Logo.png') ?>" alt="Logo">
        <h1>Dashboard Pengajar</h1>
    </div>

    <div class="d-flex align-items-center">
        <button class="theme-btn" onclick="toggleTheme()">
            <i class="bi bi-moon-stars-fill"></i>
        </button>

        <a href="<?= base_url('dashboard/profil') ?>">
            <i class="bi bi-person-circle me-1"></i>
            <?= esc(session()->get('username')) ?>
        </a>

        <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm ms-3">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>
</header>

<?php $page = $page ?? ''; ?>
<div class="sidebar">
    <a href="<?= base_url('dashboard/pengajar/materi') ?>" class="<?= ($page=='materi') ? 'active' : '' ?>">
        <i class="bi bi-journal-text me-2"></i> Kelola Materi
    </a>
    <a href="<?= base_url('dashboard/pengajar/quiz') ?>" class="<?= ($page=='quiz') ? 'active' : '' ?>">
        <i class="bi bi-ui-checks me-2"></i> Kelola Quiz
    </a>
    <a href="<?= base_url('dashboard/pengajar/banksoal') ?>" class="<?= ($page=='banksoal') ? 'active' : '' ?>">
        <i class="bi bi-collection me-2"></i> Bank Soal
    </a>
</div>


<!-- ================= CONTENT ================= -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ================= THEME TOGGLE ================= */
function toggleTheme() {
    document.body.classList.toggle('light');
    localStorage.setItem(
        'theme',
        document.body.classList.contains('light') ? 'light' : 'dark'
    );
}

// Load saved theme
if (localStorage.getItem('theme') === 'light') {
    document.body.classList.add('light');
}
</script>

</body>
</html>
