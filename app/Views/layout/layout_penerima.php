<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dashboard Penerima') ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            /* MENGGUNAKAN WARNA TEMA ADMIN AGAR SAMA PERSIS */
            --primary-gradient: linear-gradient(135deg, #0d47a1 0%, #1976d2 100%);
            --bg-body: #f3f6f9;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: #344767;
            overflow-x: hidden;
        }

        /* === 1. SIDEBAR (SAMA SEPERTI ADMIN) === */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--primary-gradient);
            position: fixed;
            top: 0; left: 0; z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex; flex-direction: column;
            box-shadow: 5px 0 15px rgba(0,0,0,0.05);
        }

        .sidebar-brand {
            padding: 25px;
            font-size: 20px; font-weight: 700; color: white;
            display: flex; align-items: center; gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 14px 25px;
            display: flex; align-items: center; gap: 15px;
            font-size: 0.95rem; font-weight: 500;
            transition: 0.3s; margin: 4px 12px;
            border-radius: 10px; text-decoration: none;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white; transform: translateX(5px);
        }

        /* === 2. MAIN WRAPPER === */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh; display: flex; flex-direction: column;
        }

        /* === 3. HEADER (SAMA SEPERTI ADMIN) === */
        .top-header {
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(10px);
            height: 80px; padding: 0 30px;
            display: flex; justify-content: space-between; align-items: center;
            position: sticky; top: 0; z-index: 999;
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
        }

        #sidebarToggle {
            background: transparent; border: none; font-size: 24px; color: #1976d2;
            cursor: pointer; transition: 0.3s;
        }
        #sidebarToggle:hover { transform: scale(1.1); color: #0d47a1; }

        /* Search Bar (Khas Penerima, tapi ditaruh di Header Admin) */
        .header-search {
            position: relative; width: 100%; max-width: 400px; margin-left: 20px;
        }
        .header-search input {
            width: 100%; border-radius: 50px; border: 1px solid #e2e8f0;
            padding: 10px 20px 10px 45px; background: #f8fafc; transition: 0.3s;
        }
        .header-search input:focus {
            background: white; border-color: #1976d2; outline: none;
            box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.1);
        }
        .header-search i {
            position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8;
        }

        .user-dropdown .dropdown-toggle {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none; color: #344767; font-weight: 600;
        }
        .user-avatar {
            width: 40px; height: 40px; background: #e3f2fd; color: #1976d2;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 18px;
        }

        .content-body { padding: 30px; flex-grow: 1; }
        
        /* Footer agar rapi di bawah */
        .footer {
            text-align: center; padding: 20px; font-size: 13px; color: #64748b;
            background: white; border-top: 1px solid #f1f5f9;
        }

        /* Logika Sidebar Mobile */
        body.sidebar-closed .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
        body.sidebar-closed .main-wrapper { margin-left: 0; }

        @media (max-width: 768px) {
            .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
            .main-wrapper { margin-left: 0; }
            body.sidebar-open .sidebar { margin-left: 0; }
            .header-search { display: none; } /* Sembunyikan search di HP */
        }
    </style>
</head>

<body>

    <nav class="sidebar">
        <div class="sidebar-brand">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Logo" style="width: 28px; margin-right: 10px;">
            LANGKAH PEDULI
        </div>
        
        <div class="py-3">
            <small class="text-uppercase px-4 text-white-50 fw-bold" style="font-size: 11px;">Menu Utama</small>
            
            <a href="<?= base_url('dashboard/penerima') ?>" class="nav-link mt-2">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            
            <small class="text-uppercase px-4 text-white-50 fw-bold mt-4 d-block" style="font-size: 11px;">Aktivitas Belajar</small>
            
            <a href="<?= base_url('dashboard/penerima/mapel') ?>" class="nav-link">
                <i class="bi bi-journal-album"></i> Materi
            </a>

            <a href="<?= base_url('dashboard/penerima/quiz') ?>" class="nav-link">
                <i class="bi bi-controller"></i> Quiz & Latihan
            </a>

            <small class="text-uppercase px-4 text-white-50 fw-bold mt-4 d-block" style="font-size: 11px;">Komunitas</small>

            <a href="<?= base_url('dashboard/forum') ?>" class="nav-link">
                <i class="bi bi-chat-text-fill"></i> Forum Diskusi
            </a>
        </div>
    </nav>

    <div class="main-wrapper">
        
        <header class="top-header">
            <div class="d-flex align-items-center flex-grow-1">
                <button id="sidebarToggle"><i class="bi bi-list"></i></button>
                
                <form action="<?= base_url('dashboard/penerima/cari') ?>" method="get" class="header-search d-none d-md-block">
                    <i class="bi bi-search"></i>
                    <input type="text" name="keyword" placeholder="Cari materi pelajaran...">
                </form>
            </div>

            <div class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="text-end me-2 d-none d-md-block">
                        <small class="d-block text-muted" style="font-size: 11px;">Halo, Siswa 👋</small>
                        <span><?= esc(session()->get('username') ?? 'Pengguna') ?></span>
                    </div>
                    <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2">
                    <li><a class="dropdown-item" href="<?= base_url('profil') ?>"><i class="bi bi-person-circle me-2"></i> Profil Saya</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                </ul>
            </div>
        </header>

        <div class="content-body">
            <?= $this->renderSection('content') ?>
        </div>

        <div class="footer">
            Copyright &copy; <?= date('Y') ?> <strong>Langkah Peduli</strong>. Semua hak dilindungi.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('sidebarToggle');
        const body = document.body;
        
        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth > 768) {
                body.classList.toggle('sidebar-closed');
            } else {
                body.classList.toggle('sidebar-open');
            }
        });
    </script>
</body>
</html>