<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanBaruModel extends Model
{
    protected $table = 'karyawan_baru';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_karyawan'];
    protected $useTimestamps = false;

    // Mendapatkan semua data karyawan
    public function getKaryawan()
    {
        return $this->findAll();
    }

}
