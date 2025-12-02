<?php

use App\Models\UserPenghargaanModel;

function beriPenghargaan($userId, $rewardId) {
    $rewardUser = new UserPenghargaanModel();

    $cek = $rewardUser->where('id_user', $userId)
                      ->where('id_penghargaan', $rewardId)
                      ->first();

    if ($cek) return;

    $rewardUser->insert([
        'id_user' => $userId,
        'id_penghargaan' => $rewardId
    ]);
}
