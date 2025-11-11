<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Terjadi Kesalahan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>body{background:#f7f9fc;font-family:Inter,system-ui,Arial;margin:0;padding:40px}</style>
</head>
<body>
  <div class="container">
    <div class="card shadow-sm border-0">
      <div class="card-body text-center">
        <h3 class="mb-3">Terjadi kesalahan pada aplikasi</h3>
        <p class="text-muted mb-3">Maaf, terjadi masalah saat memproses permintaan Anda.</p>
        <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary">Kembali ke Beranda</a>
      </div>
    </div>

    <?php
    // Jika environment development, tampilkan informasi debug singkat.
    if (getenv('CI_ENVIRONMENT') === 'development'):
    ?>
    <div class="mt-4">
      <h5>Detail (development only)</h5>
      <pre style="white-space:pre-wrap;background:#fff;border:1px solid #eee;padding:12px;border-radius:6px;">
<?= isset($message) ? esc($message) : '—' ?>
<?= isset($file) ? esc($file).' : line '.esc($line) : '' ?>
      </pre>
    </div>
    <?php endif; ?>
  </div>
</body>
</html>
