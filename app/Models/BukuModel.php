<?php
namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';            // nama tabel di DB
    protected $primaryKey = 'id_buku';    // primary key
    protected $allowedFields = ['judul', 'pengarang', 'penerbit', 'tahun_terbit', 'sampul'];

    // custom method cari
    public function findBuku($keyword)
    {
        return $this->table($this->table)
            ->like('judul', $keyword)
            ->orLike('pengarang', $keyword)
            ->orLike('penerbit', $keyword);
    }

    // custom method get detail
    public function getBuku($idbuku)
    {
        return $this->where(['id_buku' => $idbuku])->first();
    }
}
