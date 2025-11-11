<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<h3>Profil Pengguna</h3>
<ul class="list-group w-50">
    <li class="list-group-item">Nama: <?= esc($profil['nama'] ?? '-') ?></li>
    <li class="list-group-item">Email: <?= esc($profil['email'] ?? '-') ?></li>
    <li class="list-group-item">Tanggal Gabung: <?= esc($profil['tanggal_gabung'] ?? '-') ?></li>
    <li class="list-group-item">Login Terakhir: <?= esc($profil['jam_login_terakhir'] ?? '-') ?></li>
</ul>
<?= $this->endSection() ?>
