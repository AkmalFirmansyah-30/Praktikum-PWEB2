<?php
namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    // Menampilkan daftar semua buku
    public function index()
    {
        $current = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $cari    = $this->request->getVar('cari');

        if ($cari) {
            $buku = $this->bukuModel->findBuku($cari)->paginate(5, 'buku');
        } else {
            $buku = $this->bukuModel->paginate(5, 'buku');
        }

        $data = [
            'title'   => 'Daftar Buku',
            'buku'    => $buku,
            'pager'   => $this->bukuModel->pager,
            'current' => $current,
            'cari'    => $cari
        ];

        return view('buku/index', $data);
    }



    // Menampilkan detail buku berdasarkan id
    public function detail($idbuku)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku'  => $this->bukuModel->getBuku($idbuku)
        ];

        return view('buku/detail', $data);
    }

    // Form tambah buku
    public function tambah()
    {
        $data = [
            'title'      => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];

        return view('buku/tambah', $data);
    }

    // Simpan data buku baru
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.'
                ]
            ],
            'sampul' => [
                'rules'  => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,2048]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar',
                    'mime_in'  => 'Format gambar harus JPG/JPEG/PNG',
                    'max_size' => 'Ukuran file maksimal 2MB'
                ]
            ]
        ])) {
            return redirect()->to('/buku/tambah');
        }

        // Ambil file sampul
        $fileSampul = $this->request->getFile('sampul');
        $namaSampul = ($fileSampul->getError() == 4)
            ? 'default.jpg'
            : $fileSampul->getRandomName();

        // Simpan file jika ada upload
        if ($fileSampul->isValid() && !$fileSampul->hasMoved()) {
            $fileSampul->move('img', $namaSampul);
        }

        // Simpan ke database
        $this->bukuModel->save([
            'judul'        => $this->request->getVar('judul'),
            'pengarang'    => $this->request->getVar('pengarang'),
            'penerbit'     => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul'       => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/buku');
    }

    // Form ubah buku
    public function ubah($idbuku)
    {
        $data = [
            'title'      => 'Form Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku'       => $this->bukuModel->getBuku($idbuku)
        ];

        return view('buku/ubah', $data);
    }

    // Update data buku
    public function update($idbuku)
    {
        // Validasi
        if (!$this->validate([
            'judul' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Judul harus diisi.']
            ],
            'sampul' => [
                'rules'  => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,2048]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar',
                    'mime_in'  => 'Format gambar harus JPG/JPEG/PNG',
                    'max_size' => 'Ukuran file maksimal 2MB'
                ]
            ]
        ])) {
            return redirect()->to('/buku/ubah/' . $idbuku)->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        $bukuLama   = $this->bukuModel->getBuku($idbuku);

        if ($fileSampul->getError() == 4) {
            $namaSampul = $bukuLama['sampul'];
        } else {
            // Upload file baru
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);

            if (!empty($bukuLama['sampul']) && $bukuLama['sampul'] != 'default.jpg') {
                $path = 'img/' . $bukuLama['sampul'];
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        // Simpan update ke database
        $this->bukuModel->save([
            'id_buku'      => $idbuku,
            'judul'        => $this->request->getVar('judul'),
            'pengarang'    => $this->request->getVar('pengarang'),
            'penerbit'     => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul'       => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/buku');
    }


    // Hapus buku
    public function delete($idbuku)
    {
        $buku = $this->bukuModel->getBuku($idbuku);

        if ($buku && $buku['sampul'] != 'default.jpg') {
            $path = FCPATH . 'img/' . $buku['sampul'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->bukuModel->where('id_buku', $idbuku)->delete();

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/buku');
    }

}
