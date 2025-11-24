<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Forum Room</h3>

<!-- Form admin untuk post -->
<?php if (session()->get('role') === 'admin'): ?>
<form action="<?= site_url('dashboard/forum/store') ?>" method="post" class="mb-4">
    <input type="hidden" name="forum_id" value="<?= $forum_id ?>">
    <textarea class="form-control mb-2" name="content" required placeholder="Tulis pengumuman admin..."></textarea>
    <button class="btn btn-primary">Kirim</button>
</form>
<?php endif; ?>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $p): ?>
        <div class="card mb-3">
            <div class="card-body">
                <!-- Post admin -->
                <p><?= esc($p['content']) ?></p>
                <small class="text-muted">Dipost oleh <?= esc($p['username']) ?> pada <?= esc($p['created_at']) ?></small>

                <!-- Komentar -->
                <div class="mt-2">
                    <h6>Komentar:</h6>
                    <?php 
                        $commentModel = new \App\Models\CommentModel();
                        $comments = $commentModel->where('post_id', $p['id'])
                                                 ->orderBy('created_at', 'ASC')
                                                 ->findAll();
                    ?>
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $c): ?>
                            <div class="mb-1">
                                <strong><?= esc($c['username']) ?>:</strong> <?= esc($c['content']) ?>
                                <small class="text-muted">(<?= esc($c['created_at']) ?>)</small>

                                <!-- Tombol hapus komentar hanya untuk pemilik komentar -->
                                <?php if ($c['username'] === session()->get('username')): ?>
                                    <a href="<?= site_url('dashboard/forum/deleteComment/' . $c['id']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus komentar ini?');">
                                       Hapus
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Belum ada komentar.</p>
                    <?php endif; ?>
                </div>

                <!-- Form komentar user -->
                <?php if (session()->get('role') !== 'admin' && session()->get('username')): ?>
                    <form action="<?= site_url('dashboard/forum/storeComment') ?>" method="post" class="mt-2">
                        <input type="hidden" name="post_id" value="<?= $p['id'] ?>">
                        <textarea class="form-control mb-1" name="content" required placeholder="Tulis komentar..."></textarea>
                        <button class="btn btn-sm btn-primary">Kirim</button>
                    </form>
                <?php elseif (!session()->get('username')): ?>
                    <p class="text-muted mt-2">Silakan login untuk berkomentar.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">Belum ada pengumuman dari admin.</p>
<?php endif; ?>

<?= $this->endSection() ?>
