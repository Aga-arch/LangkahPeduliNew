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

    // LIST BANK SOAL
    public function index()
    {
        $id_pengajar = session()->get('id_pengajar'); // ambil dari session pengajar
        if (!$id_pengajar) {
            return redirect()->to('dashboard/pengajar')
                ->with('error', 'Session pengajar kosong!');
        }

        $data = [
            'title'    => 'Bank Soal',
            'banksoal' => $this->banksoal->where('id_pengajar', $id_pengajar)->findAll()
        ];

        return view('dashboard/pengajar/banksoal', $data);
    }

    // FORM TAMBAH BANK SOAL
    public function create()
    {
        return view('dashboard/pengajar/tambah_banksoal', [
            'title' => 'Tambah Bank Soal'
        ]);
    }

    // SIMPAN BANK SOAL
    public function store()
    {
        $id_pengajar = session()->get('id_pengajar');
        if (!$id_pengajar) {
            return redirect()->back()->with('error', 'Session pengajar kosong!');
        }

        // Ambil data dari form
        $data = [
            'nama_banksoal'      => $this->request->getPost('nama_banksoal'),
            'topik_pembelajaran' => $this->request->getPost('topik_pembelajaran'),
            'mata_pelajaran'     => $this->request->getPost('mata_pelajaran'),
            'id_pengajar'        => $id_pengajar,
            'created_at'         => date('Y-m-d H:i:s')
        ];

        // Insert ke database
        $this->banksoal->insert($data);

        return redirect()->to(base_url('dashboard/pengajar/banksoal'))
            ->with('success', 'Bank soal berhasil ditambahkan!');
    }

    // DETAIL BANK SOAL
    public function detail($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url('dashboard/pengajar/banksoal'))
                ->with('error', 'ID banksoal tidak ditemukan.');
        }

        $banksoal = $this->banksoal->find($id);
        if (!$banksoal) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil soal yang terkait
        $soalModel = new SoalModel();
        $soal = $soalModel->where('id_banksoal', $id)->findAll();

        $data = [
            'title'    => 'Detail Bank Soal',
            'banksoal' => $banksoal,
            'soal'     => $soal
        ];

        return view('dashboard/pengajar/banksoal_detail', $data);
    }

    // HAPUS BANK SOAL
    public function delete($id)
    {
        $this->banksoal->delete($id);
        return redirect()->to(base_url('dashboard/pengajar/banksoal'))
            ->with('success', 'Bank soal berhasil dihapus!');
    }
}
