<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKriteriaModel extends Model
{
    protected $table = 'data_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kriteria', 'bobot', 'bobot_normalisasi', 'tipe']; // field yang ada di tabel

    public function getDataUMKM()
    {
        return $this->findAll();
    }
}

