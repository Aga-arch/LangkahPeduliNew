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

        if (empty($username) || empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Semua kolom wajib diisi.');
        }

        if ($userModel->where('email', $email)->orWhere('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username atau email sudah terdaftar.');
        }

        $userModel->insert([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return redirect()->to(base_url('login'))->with('success', 'Pendaftaran berhasil! Silakan login.');
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

        $user = $userModel->where('username', $usernameOrEmail)
                          ->orWhere('email', $usernameOrEmail)
                          ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        session()->set([
            'username' => $user['username'],
            'email' => $user['email'],
            'logged_in' => true,
        ]);

        return redirect()->to(base_url('dashboard'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('success', 'Anda telah logout.');
    }
}
