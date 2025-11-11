<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langkah Peduli</title>
    <style>
        /* ====== GLOBAL ====== */
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #f8fafc;
            color: #333;
        }

        h1, h2, h3 {
            margin: 0;
        }

        /* ====== NAVBAR ====== */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 15px 50px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            width: 160px;
            height: auto;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #0078d7;
        }

        .btn-daftar {
            background: #0078d7;
            color: white !important;
            padding: 8px 18px;
            border-radius: 20px;
            transition: background 0.3s;
        }

        .btn-daftar:hover {
            background: #005bb5;
        }

        .btn-masuk {
            background: transparent;
            border: 2px solid #0078d7;
            color: #0078d7 !important;
            padding: 8px 18px;
            border-radius: 20px;
            transition: 0.3s;
        }

        .btn-masuk:hover {
            background: #0078d7;
            color: white !important;
        }

        /* ====== HERO ====== */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 80px 10%;
            background: linear-gradient(120deg, #e0f2ff, #ffffff);
        }

        .hero-content {
            max-width: 500px;
        }

        .hero-content h1 {
            font-size: 2.8rem;
            color: #0078d7;
            line-height: 1.3;
        }

        .hero-content p {
            margin: 15px 0;
            line-height: 1.6;
        }

        .btn-utama {
            background: #0078d7;
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn-utama:hover {
            background: #005bb5;
        }

        .hero-image {
            width: 500px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        /* ====== PROGRAM SECTION ====== */
        .program {
            text-align: center;
            padding: 80px 10%;
            background: #f3f9ff;
        }

        .program h2 {
            font-size: 2rem;
            color: #0078d7;
            margin-bottom: 40px;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 80px;
            margin-bottom: 15px;
        }

        /* ====== FOOTER ====== */
        footer {
            background: #0078d7;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }

            .hero-image {
                width: 320px;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <img src="<?= base_url('images/logo.png') ?>" alt="Langkah Peduli" class="logo">
            <ul class="nav-links">
                <li><a href="<?= base_url('/') ?>">Beranda</a></li>
                <li><a href="<?= base_url('tentang') ?>">Tentang Kami</a></li>
                <li><a href="<?= base_url('program') ?>">Program</a></li>
                <li><a href="<?= base_url('kontak') ?>">Kontak</a></li>
                <li><a href="<?= base_url('register') ?>" class="btn-daftar">Daftar</a></li>
                <li><a href="<?= base_url('login') ?>" class="btn-masuk">Masuk</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Langkah Kecil, Dampak Besar 💙</h1>
            <p>Bersama Langkah Peduli, mari bantu sesama dengan donasi, mentorship, dan aksi nyata.</p>
            <a href="<?= base_url('login') ?>" class="btn-utama">Mulai Sekarang</a>
        </div>
        <img src="<?= base_url('images/Ilustrasi.png') ?>" alt="Ilustrasi Belajar" class="hero-image">
    </section>

    <!-- Program Section -->
    <section class="program">
        <h2>Program Kami</h2>
        <div class="cards">
            <div class="card">
                <img src="<?= base_url('images/mentorship.png') ?>" alt="Mentorship">
                <h3>Mentorship</h3>
                <p>Bimbingan belajar dan pelatihan untuk meningkatkan keterampilan penerima manfaat.</p>
            </div>
            <div class="card">
                <img src="<?= base_url('images/aksi.png') ?>" alt="Aksi Sosial">
                <h3>Aksi Sosial</h3>
                <p>Ikut serta dalam kegiatan sosial untuk mempererat kepedulian antar sesama.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 Langkah Peduli. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
