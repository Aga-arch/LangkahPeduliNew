<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // 🔹 Halaman Register
    public function register()
    {
        return view('register');
    }

    // 🔹 Proses Register
    public function saveRegister()
    {
        $userModel = new UserModel();
        $username = trim($this->request->getPost('username'));
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role'); // 🆕 ambil role dari form

        // Validasi input
        if (empty($username) || empty($email) || empty($password) || empty($role)) {
            return redirect()->back()->with('error', 'Semua kolom wajib diisi.');
        }

        // Cek duplikasi username/email
        if ($userModel->where('email', $email)->orWhere('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username atau email sudah terdaftar.');
        }

        // Simpan data ke database
        $userModel->insert([
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => $role // 🆕 simpan role ke DB
        ]);

        return redirect()->to(base_url('login'))->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    // 🔹 Halaman Login
    public function login()
    {
        return view('login');
    }

    // 🔹 Proses Login
    public function processLogin()
    {
        $userModel = new UserModel();
        $usernameOrEmail = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        if (empty($usernameOrEmail) || empty($password)) {
            return redirect()->back()->with('error', 'Username dan password wajib diisi.');
        }

        // Cek user berdasarkan username atau email
        $user = $userModel->where('username', $usernameOrEmail)
                          ->orWhere('email', $usernameOrEmail)
                          ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan.');
        }

        // Cek password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        // Set session termasuk role
        session()->set([
            'username'  => $user['username'],
            'email'     => $user['email'],
            'role'      => $user['role'], // 🆕 tambahkan role ke session
            'logged_in' => true,
        ]);

        // Redirect sesuai role
        switch ($user['role']) {
            case 'admin':
                return redirect()->to(base_url('dashboard/admin'));
            case 'mentor':
                return redirect()->to(base_url('dashboard/mentor'));
            case 'penerima':
                return redirect()->to(base_url('dashboard/penerima'));
            default:
                return redirect()->to(base_url('dashboard'));
        }
    }

    // 🔹 Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('success', 'Anda telah logout.');
    }
}
