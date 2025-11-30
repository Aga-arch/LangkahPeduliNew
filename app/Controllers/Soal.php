<?php

namespace App\Controllers;
use App\Models\SoalModel;
use App\Models\BanksoalModel;

class Soal extends BaseController
{
    protected $soal;
    protected $banksoal;

    public function __construct()
    {
        $this->soal = new SoalModel();
        $this->banksoal = new BanksoalModel();
    }

    // Form tambah soal
    public function create($id_banksoal = null)
    {
        if (!$id_banksoal) {
            return redirect()->back()->with('error', 'ID banksoal tidak ditemukan.');
        }

        $banksoal = $this->banksoal->find($id_banksoal);
        if (!$banksoal) {
            return redirect()->back()->with('error', 'Bank soal tidak ditemukan.');
        }

        return view('dashboard/pengajar/tambah_soal', [
            'title' => 'Tambah Soal',
            'banksoal' => $banksoal
        ]);
    }

    // Simpan soal
    public function store($id_banksoal = null)
{
    if (!$id_banksoal) {
        return redirect()->back()->with('error', 'ID banksoal tidak ditemukan.');
    }

    $data = [
        'id_banksoal' => $id_banksoal,
        'isi_soal'    => $this->request->getPost('isi_soal'),
        'opsi1'       => $this->request->getPost('opsi1'),
        'opsi2'       => $this->request->getPost('opsi2'),
        'opsi3'       => $this->request->getPost('opsi3'),
        'opsi4'       => $this->request->getPost('opsi4'),
        'jawaban'     => $this->request->getPost('jawaban'),
        'created_at'  => date('Y-m-d H:i:s')
    ];

    $this->soal->insert($data);

    return redirect()->to(base_url('dashboard/pengajar/banksoal/detail/'.$id_banksoal))
        ->with('success', 'Soal berhasil ditambahkan!');
}
// FORM EDIT SOAL
public function edit($id_soal)
{
    $soal = $this->soal->find($id_soal);

    return view('dashboard/pengajar/edit_soal', [
        'title' => 'Edit Soal',
        'soal'  => $soal
    ]);
}

public function update($id_soal)
{
    if (!$this->request->is('post')) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $soal = $this->soal->find($id_soal);
    if (!$soal) {
        return redirect()->back()->with('error', 'Soal tidak ditemukan.');
    }

    $data = [
        'isi_soal' => $this->request->getPost('isi_soal'),
        'opsi1'    => $this->request->getPost('opsi1'),
        'opsi2'    => $this->request->getPost('opsi2'),
        'opsi3'    => $this->request->getPost('opsi3'),
        'opsi4'    => $this->request->getPost('opsi4'),
        'jawaban'  => $this->request->getPost('jawaban'),
    ];

    $this->soal->update($id_soal, $data);

    return redirect()->to(base_url('dashboard/pengajar/banksoal/detail/'.$soal['id_banksoal']))
                     ->with('success', 'Soal berhasil diperbarui!');
}



    // DELETE SOAL
    public function delete($id_soal)
    {
        $soal = $this->soal->find($id_soal);
        if (!$soal) {
            return redirect()->back()->with('error', 'Soal tidak ditemukan.');
        }

        $this->soal->delete($id_soal);

        return redirect()->to(base_url('dashboard/pengajar/banksoal/detail/'.$soal['id_banksoal']))
            ->with('success', 'Soal berhasil dihapus!');
    }
}