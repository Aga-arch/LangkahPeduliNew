<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    // Tampilkan semua akun pengguna
    public function kelolaAkun()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // ambil semua user dari tabel users

        return view('dashboard/admin/kelola_akun', $data);

    }

    // Tampilkan detail satu akun
    public function detailAkun($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Akun tidak ditemukan");
        }

        return view('admin/detail_akun', $data);
    }

    // Tampilkan form edit akun
    public function editAkun($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Akun tidak ditemukan");
        }

        return view('admin/edit_akun', $data);
    }

    // Proses update akun
    public function updateAkun($id)
    {
        $userModel = new UserModel();

        // Ambil input dari form
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role')
        ];

        // Validasi sederhana
        if (empty($data['username']) || empty($data['email'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi');
        }

        // Update ke database
        $userModel->update($id, $data);
        return redirect()->to(base_url('dashboard/admin/kelola-akun'))->with('success', 'Akun berhasil diperbarui');
    }

    // Hapus akun pengguna
    public function deleteAkun($id)
    {
        $userModel = new UserModel();

        // Cegah admin menghapus dirinya sendiri (opsional)
        $currentUserId = session()->get('user_id');
        if ($id == $currentUserId) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri');
        }

        $userModel->delete($id);
        return redirect()->to(base_url('dashboard/admin/kelola-akun'))->with('success', 'Akun berhasil dihapus');
    }
}
