<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    // =============================
    // TAMPILKAN SEMUA AKUN
    // =============================
    public function kelolaAkun()
    {
        $userModel = new UserModel();
        $data = [
            'users' => $userModel->findAll(),
            'title' => 'Kelola Akun'
        ];

        return view('dashboard/admin/kelola_akun', $data);
    }

    // =============================
    // TAMPILKAN DETAIL AKUN
    // =============================
    public function detailAkun($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            return redirect()->to(base_url('dashboard/admin/kelola-akun'))->with('error', 'Akun tidak ditemukan');
        }

        return view('dashboard/admin/detail_akun', $data);
    }

    // =============================
    // FORM EDIT AKUN
    // =============================
    public function editAkun($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            return redirect()->to(base_url('dashboard/admin/kelola-akun'))->with('error', 'Akun tidak ditemukan');
        }

        return view('dashboard/admin/edit_akun', $data);
    }

    // =============================
    // UPDATE AKUN
    // =============================
    public function updateAkun($id)
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role')
        ];

        if (empty($data['username']) || empty($data['email'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi');
        }

        $userModel->update($id, $data);
        return redirect()->to(base_url('dashboard/admin/kelola-akun'))->with('success', 'Akun berhasil diperbarui');
    }

    // =============================
    // HAPUS AKUN
    // =============================
    public function deleteAkun($id)
    {
        $userModel = new UserModel();

        // Ambil ID user yang sedang login
        $currentUserId = session()->get('userId');  // ← Perbaikan di sini

        if ($id == $currentUserId) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri');
        }

        $userModel->delete($id);

        return redirect()
            ->to(base_url('dashboard/admin/kelola-akun'))
            ->with('success', 'Akun berhasil dihapus');
    }
}
