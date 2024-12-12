<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianKaryawanModel extends Model
{
    protected $table = 'penilaian_karyawan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['karyawan_id', 'kriteria_id', 'nilai'];

    public function getPenilaian()
    {
        $data = $this->db->table($this->table)
            ->select('penilaian_karyawan.*, karyawan_baru.nama_karyawan, data_kriteria.nama_kriteria, penilaian_karyawan.nilai')
            ->join('karyawan_baru', 'karyawan_baru.id = penilaian_karyawan.karyawan_id')
            ->join('data_kriteria', 'data_kriteria.id = penilaian_karyawan.kriteria_id')
            ->orderBy('karyawan_baru.id, data_kriteria.id') // Urutkan berdasarkan karyawan dan kriteria
            ->get()
            ->getResultArray();

        // Susun data ke dalam format horizontal
        $result = [];
        foreach ($data as $row) {
            $namaKaryawan = $row['nama_karyawan'];
            $namaKriteria = $row['nama_kriteria'];
            $nilai = $row['nilai'];

            if (!isset($result[$namaKaryawan])) {
                $result[$namaKaryawan] = [
                    'nama_karyawan' => $namaKaryawan,
                ];
            }

            // Tambahkan nilai berdasarkan kriteria
            $result[$namaKaryawan][$namaKriteria] = $nilai;
        }

        return array_values($result); // Ubah hasil menjadi array numerik
    }
}
