<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6b73ff, #000dff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border-radius: 8px;
            border: none;
            background: #6b73ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #000dff;
        }
        p {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
        a {
            color: #6b73ff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .flash {
            text-align: center;
            margin-bottom: 15px;
            color: red;
        }
        .flash.success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

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
            <button type="submit">Login</button>
        </form>

        <p>Belum punya akun? <a href="<?= base_url('register') ?>">Daftar</a></p>
    </div>
</body>
</html>
