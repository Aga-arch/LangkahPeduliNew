<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Langkah Peduli</title>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #f8fafc;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(120deg, #e0f2ff, #ffffff);
        }
        .login-box {
            background: white;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            width: 350px;
        }
        .login-box h2 {
            color: #0078d7;
            margin-bottom: 25px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            background: #0078d7;
            color: white;
            padding: 12px 0;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #005bb5;
        }
        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }
        .register-link a {
            color: #0078d7;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Masuk ke Langkah Peduli</h2>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="message error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login/process') ?>" method="post">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Masuk</button>
            </form>

            <p class="register-link">
                Belum punya akun? <a href="<?= base_url('register') ?>">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>
