<h2>Login</h2>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <p style="color:green"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<form action="<?= base_url('login/process') ?>" method="post">
    <?= csrf_field() ?>
    <input type="text" name="username" placeholder="Username atau Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

<p>Belum punya akun? <a href="<?= base_url('register') ?>">Daftar</a></p>
