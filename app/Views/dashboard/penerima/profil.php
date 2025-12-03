<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif; 
            background: #4c3aed;
        }

        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            background: #FFFFFF;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: auto;
            border: 3px solid #4c3aed;
        }

        /* NAMA DI ATAS FOTO */
        .profile-name {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }

        .info-box {
            margin-top: 25px;
        }

        .label {
            font-weight: 600;
            color: #4c3aed;
            font-size: 16px;
            margin-top: 20px;
        }

        .value {
            font-size: 17px;
            margin-top: 6px;
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 10px;
            background: #f5f5ff;
            border: 1px solid #d9d6ff;
        }

        .btn {
            margin-top: 20px;
            padding: 12px 30px;
            background: #4c3aed;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 30px;
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="profile-container">

    <!-- NAMA DI ATAS FOTO -->
    <div class="profile-name">
        <?= esc($user['nama'] ?? $user['username'] ?? 'Pengguna') ?>
    </div>

    <!-- FOTO -->
    <img 
        src="<?= !empty($user['foto']) 
            ? base_url('uploads/profile/' . $user['foto']) 
            : 'https://i.imgur.com/4Z7kz9P.png' ?>" 
        class="avatar" 
        alt="Foto Profil">

    <!-- INFO PROFIL -->
    <div class="info-box">

        <div class="label">Username</div>
        <div class="value"><?= esc($user['username']) ?></div>

        <div class="label">Email</div>
        <div class="value"><?= esc($user['email']) ?></div>

        <div class="label">Peran</div>
        <div class="value"><?= esc($user['role']) ?></div>

        <div class="label">Tanggal Gabung</div>
        <div class="value">
            <?= isset($user['created_at']) && $user['created_at']
                ? date('d M Y', strtotime($user['created_at']))
                : 'Tidak diketahui' ?>
        </div>

    </div>

    <!-- BUTTONS -->
    <a class="btn" href="<?= base_url('dashboard/profil/edit') ?>">Edit Profil</a>
    <a class="btn" href="<?= base_url('dashboard/penerima') ?>">Kembali ke Dashboard</a>

</div>

</body>
</html>