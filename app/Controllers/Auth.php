<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function saveRegister()
    {
        $userModel = new UserModel();
        $username = trim($this->request->getPost('username'));
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        if (empty($username) || empty($email) || empty($password) || empty($role)) {
            return redirect()->back()->with('error', 'Semua kolom wajib diisi.');
        }

        if ($role === 'admin') {
            return redirect()->back()->with('error', 'Role admin tidak dapat didaftarkan.');
        }

        if ($userModel->where('email', $email)->orWhere('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username atau email sudah terdaftar.');
        }

        $userModel->insert([
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => $role
        ]);

        return redirect()->to('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();
        $usernameOrEmail = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        if (empty($usernameOrEmail) || empty($password)) {
            return redirect()->back()->with('error', 'Username dan password wajib diisi.');
        }

        $user = $userModel
            ->groupStart()
            ->where('LOWER(username)', strtolower($usernameOrEmail))
            ->orWhere('LOWER(email)', strtolower($usernameOrEmail))
            ->groupEnd()
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        // Set session umum
        session()->set([
            'id'  => $user['id'],
            'username'  => $user['username'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'logged_in' => true,
        ]);

        // Role khusus
        if ($user['role'] === 'admin') {
            return redirect()->to('dashboard/admin');
        }

        if ($user['role'] === 'pengajar') {
            // SET SESSION KHUSUS PENGAJAR
            session()->set('id_pengajar', $user['id']); 
            return redirect()->to('dashboard/pengajar');
        }

        if ($user['role'] === 'penerima') {
            return redirect()->to('dashboard/penerima');
        }

        return redirect()->to('dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login')->with('success', 'Anda telah logout.');
    }
}
