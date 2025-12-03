<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #4c3aed;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .edit-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #4c3aed;
        }

        /* FOTO */
        .avatar {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #4c3aed;
            margin: 0 auto 25px auto;
            display: block;
        }

        /* LABEL */
        label {
            font-size: 16px;
            font-weight: 600;
            color: #4c3aed;
            display: block;
            text-align: left;
            margin-bottom: 6px;
        }

        /* INPUT */
        input {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .file-input {
            border: none;
            padding-left: 0;
        }

        /* BUTTON SIMPAN */
        .btn-save {
            width: 100%;
            background: #4c3aed;
            color: white;
            padding: 14px;
            font-size: 17px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-save:hover {
            background: #3b2ad7;
        }

        /* BUTTON KEMBALI */
        .btn-back {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #4c3aed;
            font-size: 16px;
        }
    </style>
</head>

<body>

<div class="edit-container">

    <h2>Edit Profil</h2>

    <!-- FOTO PREVIEW -->
    <img 
        src="<?= !empty($user['foto']) ? base_url('uploads/profile/'.$user['foto']) : 'https://i.imgur.com/4Z7kz9P.png' ?>"
        id="previewFoto"
        class="avatar"
    >

    <form action="<?= base_url('/dashboard/profil/update') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <label>Username</label>
        <input type="text" name="username" value="<?= esc($user['username']) ?>">

        <label>Email</label>
        <input type="email" name="email" value="<?= esc($user['email']) ?>">

        <label>Upload Foto</label>
        <input
            type="file"
            name="foto"
            accept="image/*"
            class="file-input"
            onchange="previewImage(event)"
        >

        <button type="submit" class="btn-save">Simpan Perubahan</button>

        <a href="<?= base_url('/dashboard/profil') ?>" class="btn-back">Kembali</a>
    </form>

</div>

<script>
function previewImage(event) {
    const img = document.getElementById('previewFoto');
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => img.src = e.target.result;
    reader.readAsDataURL(file);
}
</script>

</body>
</html>