<?php
namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'universitas';
    protected $primaryKey = 'ktp_dosen';
    protected $allowedFields = ['nama_dosen', 'alamat','email', 'no_telpon','bidang_mengajar','jadwal_tugas'];

    public function getDosen($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['ktp_dosen' => $id])->first();
    }

    public function findBuku($keyword)
    {
        return $this->table($this->table)
            ->like('nama', $keyword)
            ->orLike('alamat', $keyword)
            ->orLike('email', $keyword);
    }
}
