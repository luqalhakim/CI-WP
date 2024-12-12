<?php

namespace App\Models;

use CodeIgniter\Model;

class VektorSVModel extends Model
{
    protected $table = 'penilaian_karyawan';

    /**
     * Ambil kriteria beserta bobot normalisasi dan tipe
     */
    public function getKriteriaWithBobot()
    {
        return $this->db->table('data_kriteria')
            ->select('id, nama_kriteria, bobot_normalisasi, tipe') // Ambil bobot normalisasi dan tipe
            ->get()
            ->getResultArray();
    }

    /**
     * Ambil data penilaian per karyawan dengan kriteria dan bobot normalisasi
     */
    public function getPenilaianGrouped()
    {
        $data = $this->db->table($this->table)
            ->select('karyawan_baru.nama_karyawan, penilaian_karyawan.kriteria_id, penilaian_karyawan.nilai, data_kriteria.bobot_normalisasi, data_kriteria.tipe')
            ->join('karyawan_baru', 'karyawan_baru.id = penilaian_karyawan.karyawan_id')
            ->join('data_kriteria', 'data_kriteria.id = penilaian_karyawan.kriteria_id') // Join dengan tabel data_kriteria untuk mendapatkan bobot normalisasi dan tipe
            ->get()
            ->getResultArray();

        $grouped = [];
        foreach ($data as $row) {
            $grouped[$row['nama_karyawan']][] = [
                'kriteria_id' => $row['kriteria_id'],
                'nilai' => $row['nilai'],
                'bobot_normalisasi' => $row['bobot_normalisasi'],
                'tipe' => $row['tipe']
            ];
        }

        return $grouped;
    }
}
