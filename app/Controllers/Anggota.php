<?php
namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Daftar Anggota',
            'anggota' => $this->anggotaModel->findAll()
        ];

        return view('anggota/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'   => 'Detail Anggota',
            'anggota' => $this->anggotaModel->find($id)
        ];

        return view('anggota/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Anggota'
        ];

        return view('anggota/tambah', $data);
    }

    public function simpan()
    {
        $this->anggotaModel->save([
            'nama'   => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp'   => $this->request->getVar('telp')
        ]);

        session()->setFlashdata('pesan', 'Anggota berhasil ditambahkan.');
        return redirect()->to('/anggota');
    }

    // === FORM EDIT ===
    public function edit($id)
    {
        $data = [
            'title'   => 'Form Ubah Anggota',
            'anggota' => $this->anggotaModel->find($id)
        ];

        return view('anggota/edit', $data);
    }

    // === UPDATE DATA ===
    public function update($id)
    {
        $this->anggotaModel->update($id, [
            'nama'   => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp'   => $this->request->getVar('telp')
        ]);

        session()->setFlashdata('pesan', 'Data anggota berhasil diubah.');
        return redirect()->to('/anggota');
    }

    // === HAPUS DATA ===
    public function delete($id)
    {
        $this->anggotaModel->delete($id);

        session()->setFlashdata('pesan', 'Data anggota berhasil dihapus.');
        return redirect()->to('/anggota');
    }
}
