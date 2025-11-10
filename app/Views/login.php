<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #4f46e5, #3b82f6, #06b6d4);
      background-size: 200% 200%;
      animation: gradientMove 6s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      backdrop-filter: blur(15px);
      background: rgba(255, 255, 255, 0.15);
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      width: 90%;
      max-width: 400px;
      color: white;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo {
      width: 80px;
      height: 80px;
      background: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 15px;
      color: #3b82f6;
      font-weight: 700;
      font-size: 26px;
      box-shadow: 0 0 15px rgba(255,255,255,0.4);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
      font-size: 24px;
      letter-spacing: 0.5px;
    }

    input {
      width: 100%;
      padding: 14px 15px;
      margin: 10px 0;
      border-radius: 10px;
      border: none;
      font-size: 15px;
      outline: none;
      background: rgba(255,255,255,0.9);
      color: #333;
      transition: 0.3s ease;
    }

    input:focus {
      background: white;
      box-shadow: 0 0 6px rgba(255,255,255,0.7);
    }

    button {
      width: 100%;
      padding: 14px;
      margin-top: 15px;
      border-radius: 10px;
      border: none;
      background: #2563eb;
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    button:hover {
      background: #1e40af;
      transform: scale(1.03);
    }

    .flash {
      text-align: center;
      margin-bottom: 15px;
      font-size: 14px;
      font-weight: 500;
      color: #f87171;
    }

    .flash.success {
      color: #22c55e;
    }

    p {
      text-align: center;
      margin-top: 25px;
      font-size: 14px;
      color: rgba(255,255,255,0.85);
    }

    a {
      color: #fff;
      font-weight: 500;
      text-decoration: underline;
    }

    a:hover {
      text-decoration: none;
      color: #cbd5e1;
    }

    @media (max-width: 480px) {
      .container {
        padding: 35px 25px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">LP</div>
    <h2>Selamat Datang</h2>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="flash"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('success')): ?>
      <div class="flash success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('login/process') ?>" method="post">
      <?= csrf_field() ?>
      <input type="text" name="username" placeholder="Username atau Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>
    </form>

    <p>Belum punya akun? <a href="<?= base_url('register') ?>">Daftar Sekarang</a></p>
  </div>
</body>
</html>
