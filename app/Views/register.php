<h2>Daftar Akun</h2>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="<?= base_url('register/save') ?>" method="post">
    <?= csrf_field() ?>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a></p>
