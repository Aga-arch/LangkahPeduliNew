<?php

namespace App\Controllers;

use App\Models\PenghargaanModel;
use App\Models\UserPenghargaanModel;

class Penghargaan extends BaseController
{
    // Halaman utama penghargaan
    public function index()
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('id');

    $rewardModel = new PenghargaanModel();
    $userRewardModel = new UserPenghargaanModel();

    // Ambil semua id penghargaan yang dimiliki user
    $rewardIds = $userRewardModel
                    ->where('id_user', $userId)
                    ->findColumn('id_penghargaan');

    // Jika user belum punya penghargaan, jangan pakai whereIn()
    if (empty($rewardIds)) {
        $punya = [];        // hasil kosong
    } else {
        $punya = $rewardModel
                    ->whereIn('id_penghargaan', $rewardIds)
                    ->findAll();
    }

    $data = [
        'title' => 'Penghargaan Saya',
        'username' => session()->get('username'),
        'punya' => $punya,
        'semua_penghargaan' => $rewardModel->findAll()
    ];

    return view('dashboard/penerima/penghargaan', $data);
}


    // Memberikan penghargaan secara manual (opsional)
    public function dapatkan($idReward)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('id');

        $userRewardModel = new UserPenghargaanModel();

        // Cek apakah user sudah punya penghargaan ini
        $cek = $userRewardModel->where([
            'id_user' => $userId,
            'id_penghargaan' => $idReward
        ])->first();

        if (!$cek) {
            $userRewardModel->insert([
                'id_user' => $userId,
                'id_penghargaan' => $idReward
            ]);
        }

        return redirect()->back()->with('success', 'Penghargaan berhasil ditambahkan!');
    }

    // Dipakai dari sistem otomatis, contoh dari helper reward
    public function tambahRewardOtomatis($userId, $rewardId)
    {
        $model = new UserPenghargaanModel();

        $cek = $model->where([
            'id_user' => $userId,
            'id_penghargaan' => $rewardId
        ])->first();

        if (!$cek) {
            $model->insert([
                'id_user' => $userId,
                'id_penghargaan' => $rewardId
            ]);
        }

        return true;
    }
}
