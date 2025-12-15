<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Admin'; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #0d47a1 0%, #1976d2 100%);
            --bg-body: #f3f6f9;
            --sidebar-width: 260px;
            --card-shadow: 0 10px 20px rgba(0,0,0,0.05);
            --hover-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: #344767;
            overflow-x: hidden;
        }

        /* === SIDEBAR === */
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

        /* === MAIN CONTENT === */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh; display: flex; flex-direction: column;
        }

        /* === HEADER === */
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

        /* === LOGIKA TOGGLE SIDEBAR === */
        body.sidebar-closed .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
        body.sidebar-closed .main-wrapper { margin-left: 0; }

        @media (max-width: 768px) {
            .sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
            .main-wrapper { margin-left: 0; }
            body.sidebar-open .sidebar { margin-left: 0; }
        }
    </style>
</head>

<body>
    <nav class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-layers-fill"></i> ADMIN PANEL
        </div>
        <div class="py-3">
            <small class="text-uppercase px-4 text-white-50 fw-bold" style="font-size: 11px;">Utama</small>
            <a href="<?= base_url('dashboard/admin') ?>" class="nav-link mt-2 active">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            
            <small class="text-uppercase px-4 text-white-50 fw-bold mt-4 d-block" style="font-size: 11px;">Manajemen</small>
            <a href="<?= base_url('dashboard/admin/kelola-akun') ?>" class="nav-link">
                <i class="bi bi-people-fill"></i> Kelola Akun
            </a>
            <a href="<?= base_url('dashboard/admin/kelola-forum') ?>" class="nav-link">
                <i class="bi bi-chat-dots-fill"></i> Kelola Forum
            </a>
        </div>
    </nav>

    <div class="main-wrapper">
        <header class="top-header">
            <div class="d-flex align-items-center">
                <button id="sidebarToggle"><i class="bi bi-list"></i></button>
                <h5 class="mb-0 ms-3 fw-bold text-primary d-none d-md-block">Dashboard Overview</h5>
            </div>

            <div class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="text-end me-2 d-none d-md-block">
                        <small class="d-block text-muted" style="font-size: 11px;">Administrator</small>
                        <span><?= session()->get('username') ?></span>
                    </div>
                    <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2">
                    <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                </ul>
            </div>
        </header>

        <div class="content-body">
            <?= $this->renderSection('content') ?>
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