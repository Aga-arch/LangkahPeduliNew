<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - Langkah Peduli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto shadow-sm" style="max-width:400px;">
        <div class="card-body">
            <h4 class="text-center mb-3">Daftar Akun</h4>
            <form action="/save-register" method="post">
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <button class="btn btn-success w-100">Daftar</button>
            </form>
            <p class="text-center mt-3">Sudah punya akun? <a href="/login">Masuk</a></p>
        </div>
    </div>
</div>
</body>
</html>
