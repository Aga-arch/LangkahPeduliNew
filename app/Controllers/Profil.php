<?php namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    private function getUser()
    {
        $id = session()->get('id');
        if (!$id) {
            return null;
        }
        return (new UserModel())->find($id);
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        $user = $this->getUser();

        if ($role === 'pengajar') {
            return view('dashboard/pengajar/profil', ['user' => $user]);
        }

        if ($role === 'penerima') {
            return view('dashboard/penerima/profil', ['user' => $user]);
        }

        return view('dashboard/profil', ['user' => $user]);
    }

    public function edit()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        $user = $this->getUser();

        if ($role === 'pengajar') {
            return view('dashboard/pengajar/edit_profil', ['user' => $user]);
        }

        if ($role === 'penerima') {
            return view('dashboard/penerima/edit_profil', ['user' => $user]);
        }

        return view('dashboard/edit_profil', ['user' => $user]);
    }

    public function update()
{
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('login'));
    }

    $userModel = new UserModel();
    $id = session()->get('id');
    $user = $this->getUser();

    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
    ];

    // Upload foto
    $foto = $this->request->getFile('foto');

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        if (!is_dir('uploads/profile')) {
            mkdir('uploads/profile', 0777, true);
        }

        if (!empty($user['foto']) && file_exists('uploads/profile/'.$user['foto'])) {
            unlink('uploads/profile/'.$user['foto']);
        }

        $namaBaru = time() . '_' . $foto->getRandomName();
        $foto->move('uploads/profile', $namaBaru);
        $data['foto'] = $namaBaru;
    }

    $userModel->update($id, $data);

    // SELALU ke 1 route universal
    return redirect()->to('/dashboard/profil')
                     ->with('success', 'Profil berhasil diperbarui!');
}
}