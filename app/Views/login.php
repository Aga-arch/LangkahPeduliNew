<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Langkah Peduli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto shadow-sm" style="max-width:400px;">
        <div class="card-body">
            <h4 class="text-center mb-3">Masuk Akun</h4>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <form action="/auth-login" method="post">
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <button class="btn btn-success w-100">Masuk</button>
            </form>
            <p class="text-center mt-3">Belum punya akun? <a href="/register">Daftar</a></p>
        </div>
    </div>
</div>
</body>
</html>
