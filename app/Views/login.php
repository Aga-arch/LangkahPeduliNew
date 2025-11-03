<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Langkah Peduli</title>
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

        /* ====== LOGIN BOX ====== */
        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(120deg, #e0f2ff, #ffffff);
        }

        .circle {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle at 30% 30%, #0078d7, #005bb5);
            border-radius: 50%;
            top: 10%;
            left: 10%;
            opacity: 0.2;
            z-index: 0;
        }

        .login-box {
            position: relative;
            background: white;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            z-index: 1;
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
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #0078d7;
        }

        button {
            background: #0078d7;
            color: white;
            padding: 12px 0;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
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
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .message {
            font-size: 14px;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .message.error {
            background: #fdecea;
            color: #c0392b;
        }

        .message.success {
            background: #eafaf1;
            color: #27ae60;
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 600px) {
            .login-box {
                width: 90%;
                padding: 30px 25px;
            }

            .circle {
                width: 200px;
                height: 200px;
                top: 5%;
                left: 5%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="circle"></div>
        <div class="login-box">
            <h2>Masuk</h2>

            @if(session('error'))
                <p class="message error">{{ session('error') }}</p>
            @endif

            @if(session('success'))
                <p class="message success">{{ session('success') }}</p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Masuk</button>
            </form>

            <p class="register-link">Belum punya akun? 
                <a href="{{ route('register') }}">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>
