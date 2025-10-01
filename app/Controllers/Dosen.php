<?php
namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new dosenModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Daftar dosen',
            'dosen' => $this->dosenModel->findAll()
        ];

        return view('dosen/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'   => 'Detail dosen',
            'dosen' => $this->dosenModel->find($id)
        ];

        return view('dosen/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah dosen'
        ];

        return view('dosen/tambah', $data);
    }

    public function simpan()
    {
        $this->dosenModel->save([
            'nama'   => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp'   => $this->request->getVar('telp')
        ]);

        session()->setFlashdata('pesan', 'dosen berhasil ditambahkan.');
        return redirect()->to('/dosen');
    }

    // === FORM EDIT ===
    public function edit($id)
    {
        $data = [
            'title'   => 'Form Ubah dosen',
            'dosen' => $this->dosenModel->find($id)
        ];

        return view('dosen/edit', $data);
    }

    // === UPDATE DATA ===
    public function update($id)
    {
        $this->dosenModel->update($id, [
            'nama'   => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp'   => $this->request->getVar('telp')
        ]);

        session()->setFlashdata('pesan', 'Data dosen berhasil diubah.');
        return redirect()->to('/dosen');
    }

    // === HAPUS DATA ===
    public function delete($id)
    {
        $this->dosenModel->delete($id);

        session()->setFlashdata('pesan', 'Data dosen berhasil dihapus.');
        return redirect()->to('/dosen');
    }
}
