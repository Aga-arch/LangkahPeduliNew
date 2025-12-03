<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengajar</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef2ff;
            font-family: 'Inter', sans-serif;
        }

        .profile-container {
            max-width: 620px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            text-align: center;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #6366f1;
            margin-bottom: 20px;
        }

        .name {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .info-box {
            margin-top: 25px;
            text-align: left;
        }

        .label {
            font-size: 15px;
            font-weight: 600;
            color: #6366f1;
            margin-top: 16px;
        }

        .value {
            background: #f1f5ff;
            padding: 12px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid #d4d8ff;
        }

        .btn {
            margin-top: 25px;
            padding: 12px 30px;
            background: #6366f1;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>

<body>

<div class="profile-container">

    <!-- FOTO PROFIL -->
    <img 
        src="<?= !empty($user['foto']) 
            ? base_url('uploads/profile/'.$user['foto']) 
            : 'https://i.imgur.com/4Z7kz9P.png' ?>" 
        class="avatar"
    >

    <div class="name"><?= esc($user['username']) ?></div>

    <!-- INFO -->
    <div class="info-box">

        <div class="label">Username</div>
        <div class="value"><?= esc($user['username']) ?></div>

        <div class="label">Email</div>
        <div class="value"><?= esc($user['email']) ?></div>

        <div class="label">Peran</div>
        <div class="value"><?= esc($user['role']) ?></div>

        <div class="label">Tanggal Gabung</div>
        <div class="value">
            <?= isset($user['created_at']) 
                ? date('d M Y', strtotime($user['created_at'])) 
                : 'Tidak diketahui' ?>
        </div>

    </div>

    <a class="btn" href="<?= base_url('/dashboard/pengajar/profil/edit') ?>">Edit Profil</a>
    <a class="btn" href="<?= base_url('/dashboard/pengajar') ?>">Kembali</a>

</div>

</body>
</html>
