<?php

namespace App\Controllers;

use App\Models\BanksoalModel;
use App\Models\SoalModel;

class Banksoal extends BaseController
{
    protected $banksoal;

    public function __construct()
    {
        $this->banksoal = new BanksoalModel();
    }

    // ================= LIST BANK SOAL =================
    public function index()
    {
        $id_pengajar = session()->get('id_pengajar');

        if (!$id_pengajar) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login terlebih dahulu.');
        }

        $data = [
            'title'    => 'Bank Soal',
            'banksoal' => $this->banksoal->where('id_pengajar', $id_pengajar)->findAll(),
            'username' => session()->get('username')
        ];

        return view('dashboard/pengajar/banksoal', $data);
    }

    // ================= FORM TAMBAH =================
    public function create()
    {
        return view('dashboard/pengajar/tambah_banksoal', [
            'title' => 'Tambah Bank Soal'
        ]);
    }

    // ================= SIMPAN DATA =================
    public function simpan()
    {
        $id_pengajar = session()->get('id_pengajar');

        if (!$id_pengajar) {
            return redirect()->back()->with('error', 'Session pengajar tidak ditemukan.');
        }

        $data = [
            'nama_banksoal'      => $this->request->getPost('nama_banksoal'),
            'topik_pembelajaran' => $this->request->getPost('topik_pembelajaran'),
            'mata_pelajaran'     => $this->request->getPost('mata_pelajaran'),
            'id_pengajar'        => $id_pengajar,
            'created_at'         => date('Y-m-d H:i:s')
        ];

        // Insert data
        if (!$this->banksoal->insert($data)) {
            return redirect()->back()->with('error', implode(', ', $this->banksoal->errors()));
        }

        return redirect()->to(base_url('dashboard/pengajar/banksoal'))
            ->with('success', 'Bank soal berhasil ditambahkan!');
    }

    // ================= FORM EDIT =================
    public function edit($id_banksoal)
    {
        $banksoal = $this->banksoal->find($id_banksoal);

        if (!$banksoal || $banksoal['id_pengajar'] != session()->get('id_pengajar')) {
            return redirect()->back()->with('error', 'Tidak diizinkan!');
        }

        return view('dashboard/pengajar/edit_banksoal', [
            'title'    => 'Edit Bank Soal',
            'banksoal' => $banksoal
        ]);
    }

    // ================= UPDATE DATA =================
    public function update($id_banksoal)
    {
        $banksoal = $this->banksoal->find($id_banksoal);

        if (!$banksoal || $banksoal['id_pengajar'] != session()->get('id_pengajar')) {
            return redirect()->back()->with('error', 'Tidak diizinkan!');
        }

        $data = [
            'nama_banksoal'      => $this->request->getPost('nama_banksoal'),
            'topik_pembelajaran' => $this->request->getPost('topik_pembelajaran'),
            'mata_pelajaran'     => $this->request->getPost('mata_pelajaran')
        ];

        $this->banksoal->update($id_banksoal, $data);

        return redirect()->to(base_url('dashboard/pengajar/banksoal'))
            ->with('success', 'Bank soal berhasil diperbarui!');
    }

    // ================= DETAIL BANK SOAL =================
    public function detail($id_banksoal)
    {
        $banksoal = $this->banksoal->find($id_banksoal);

        if (!$banksoal || $banksoal['id_pengajar'] != session()->get('id_pengajar')) {
            return redirect()->back()->with('error', 'Tidak diizinkan!');
        }

        $soalModel = new SoalModel();
        $soal = $soalModel->where('id_banksoal', $id_banksoal)->findAll();

        return view('dashboard/pengajar/detail_banksoal', [
            'title'    => 'Detail Bank Soal',
            'banksoal' => $banksoal,
            'soal'     => $soal
        ]);
    }

    // ================= HAPUS DATA =================
    public function delete($id_banksoal)
    {
        $banksoal = $this->banksoal->find($id_banksoal);

        if (!$banksoal || $banksoal['id_pengajar'] != session()->get('id_pengajar')) {
            return redirect()->back()->with('error', 'Tidak diizinkan!');
        }

        $this->banksoal->delete($id_banksoal);

        return redirect()->to(base_url('dashboard/pengajar/banksoal'))
            ->with('success', 'Bank soal berhasil dihapus!');
    }
}
