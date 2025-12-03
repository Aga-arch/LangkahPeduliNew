<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Pengajar</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #eef2ff;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .edit-container {
            max-width: 620px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            text-align: center;
        }

        h2 {
            color: #4f46e5;
            font-size: 28px;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .avatar {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #4f46e5;
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #4f46e5;
            display: block;
            text-align: left;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .btn-save {
            width: 100%;
            padding: 14px;
            background: #4f46e5;
            color: white;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-size: 17px;
        }

        .btn-back {
            display: block;
            margin-top: 18px;
            color: #4f46e5;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="edit-container">

    <h2>Edit Profil Pengajar</h2>

    <img 
        src="<?= !empty($user['foto']) ? base_url('uploads/profile/'.$user['foto']) : 'https://i.imgur.com/4Z7kz9P.png' ?>"
        id="previewFoto"
        class="avatar"
    >

    <form action="<?= base_url('/dashboard/pengajar/profil/update') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <label>Username</label>
        <input type="text" name="username" value="<?= esc($user['username']) ?>">

        <label>Email</label>
        <input type="email" name="email" value="<?= esc($user['email']) ?>">

        <label>Foto Baru</label>
        <input type="file" name="foto" accept="image/*" onchange="previewImage(event)">

        <button type="submit" class="btn-save">Simpan Perubahan</button>

        <a href="<?= base_url('/dashboard/pengajar/profil') ?>" class="btn-back">Kembali</a>
    </form>

</div>

<script>
function previewImage(event) {
    const img = document.getElementById('previewFoto');
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = e => img.src = e.target.result;
    reader.readAsDataURL(file);
}
</script>

</body>
</html>
