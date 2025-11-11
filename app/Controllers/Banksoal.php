<?php

namespace App\Controllers;

use App\Models\BanksoalModel;

class Banksoal extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BanksoalModel();
    }

    // Daftar soal milik pengajar
    public function index()
    {
        $id_pengajar = session()->get('id');
        $data = [
            'title' => 'Bank Soal',
            'banksoal' => $this->model->where('id_pengajar', $id_pengajar)->findAll(),
            'username' => session()->get('username')
        ];
        return view('dashboard/pengajar/banksoal', $data);
    }

    // Form tambah soal
    public function create()
    {
        $data = ['title' => 'Tambah Soal'];
        return view('dashboard/pengajar/tambah_banksoal', $data);
    }

    // Simpan soal baru
    public function store()
    {
        $id_pengajar = session()->get('id');

        $opsi = $this->request->getPost('opsi');
        if (is_array($opsi)) $opsi = json_encode($opsi);

        $data = [
            'id_pengajar' => $id_pengajar,
            'type_soal' => $this->request->getPost('type_soal'),
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'opsi' => $opsi,
            'jawaban' => $this->request->getPost('jawaban'),
            'tingkat_kesulitan' => $this->request->getPost('tingkat_kesulitan')
        ];

        $this->model->insert($data);
        return redirect()->to(base_url('dashboard/pengajar/banksoal'))->with('success', 'Soal berhasil ditambahkan!');
    }

    // Form edit soal (hanya milik pengajar)
    public function edit($id)
    {
        $soal = $this->model->find($id);
        if (!$soal || $soal['id_pengajar'] != session()->get('id')) {
            return redirect()->to(base_url('dashboard/pengajar/banksoal'))->with('error', 'Tidak diizinkan mengubah soal ini.');
        }

        $data = [
            'title' => 'Edit Soal',
            'soal' => $soal
        ];

        return view('dashboard/pengajar/edit_banksoal', $data);
    }

    // Update soal
    public function update($id)
    {
        $soal = $this->model->find($id);
        if (!$soal || $soal['id_pengajar'] != session()->get('id')) {
            return redirect()->to(base_url('dashboard/pengajar/banksoal'))->with('error', 'Tidak diizinkan mengubah soal ini.');
        }

        $opsi = $this->request->getPost('opsi');
        if (is_array($opsi)) $opsi = json_encode($opsi);

        $data = [
            'type_soal' => $this->request->getPost('type_soal'),
            'pertanyaan' => $this->request->getPost('pertanyaan'),
            'opsi' => $opsi,
            'jawaban' => $this->request->getPost('jawaban'),
            'tingkat_kesulitan' => $this->request->getPost('tingkat_kesulitan')
        ];

        $this->model->update($id, $data);
        return redirect()->to(base_url('dashboard/pengajar/banksoal'))->with('success', 'Soal berhasil diperbarui!');
    }

    // Hapus soal (hanya milik pengajar)
    public function delete($id)
    {
        $soal = $this->model->find($id);
        if (!$soal || $soal['id_pengajar'] != session()->get('id')) {
            return redirect()->to(base_url('dashboard/pengajar/banksoal'))->with('error', 'Tidak diizinkan menghapus soal ini.');
        }

        $this->model->delete($id);
        return redirect()->to(base_url('dashboard/pengajar/banksoal'))->with('success', 'Soal berhasil dihapus!');
    }
}
