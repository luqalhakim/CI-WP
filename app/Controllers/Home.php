<?php

namespace App\Controllers;

use App\Models\KaryawanBaruModel;
use App\Models\DataKriteriaModel;
use App\Models\PenilaianKaryawanModel;
use App\Models\VektorSVModel;

use CodeIgniter\Controller;
use Config\Services;

class Home extends BaseController
{
    public function index()
    {
        // Ambil jumlah record dari masing-masing tabel
        $karyawanModel = new KaryawanBaruModel();
        $kriteriaModel = new DataKriteriaModel();
        $penilaianModel = new PenilaianKaryawanModel();

        // Ambil jumlah data
        $jumlahKaryawan = $karyawanModel->countAllResults(); // Menghitung jumlah karyawan
        $jumlahKriteria = $kriteriaModel->countAllResults(); // Menghitung jumlah kriteria
        $jumlahPenilaian = $penilaianModel->countAllResults(); // Menghitung jumlah penilaian

        // Kirim data jumlah ke view
        $data = [
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahKriteria' => $jumlahKriteria,
            'jumlahPenilaian' => $jumlahPenilaian,
        ];

        echo view('templates/header');
        echo view('index', $data);
        echo view('templates/footer');
    }

    // CRUD karyawan baru
    public function karyawanbaru()
    {
        $model = new KaryawanBaruModel();
        $data['karyawan'] = $model->findAll();

        // Tampilkan ke view
        echo view('templates/header');
        echo view('wp/karyawanbaru', $data);
        echo view('templates/footer');
    }

    public function createkaryawan()
    {
        // Menampilkan form input karyawan baru
        echo view('templates/header');
        echo view('wp/createkaryawan');
        echo view('templates/footer');
    }

    public function storekaryawan()
    {
        // Menyimpan data karyawan baru
        $model = new KaryawanBaruModel();

        // Validasi input
        if ($this->validate([
            'nama_karyawan' => 'required|min_length[3]|max_length[100]',
            // Tambahkan validasi sesuai dengan field lainnya
        ])) {
            // Ambil data dari form
            $data = [
                'nama_karyawan' => $this->request->getVar('nama_karyawan'),
                // Tambahkan data lainnya sesuai dengan field pada form
            ];

            // Simpan data ke dalam database
            $model->save($data);

            // Redirect ke halaman yang menampilkan data karyawan
            return redirect()->to(base_url('karyawanbaru'));
        } else {
            // Jika validasi gagal, tampilkan kembali form dengan error
            echo view('templates/header');
            echo view('wp/createkaryawan', ['validation' => $this->validator]);
            echo view('templates/footer');
        }
    }

    public function editkaryawan($id)
    {
        // Tambahkan log atau print untuk debugging
        log_message('error', 'Edit Karyawan ID: ' . $id);

        $model = new KaryawanBaruModel();
        $karyawan = $model->find($id);

        if (empty($karyawan)) {
            // Tambahkan pesan error yang lebih informatif
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Karyawan dengan ID ' . $id . ' tidak ditemukan');
        }

        $data = [
            'karyawan' => $karyawan
        ];

        // Tampilkan form update dengan data karyawan
        echo view('templates/header');
        echo view('wp/editkaryawan', $data);
        echo view('templates/footer');
    }

    public function updateKaryawan($id)
    {
        $model = new KaryawanBaruModel();

        // Gunakan Services::validation() dengan cara yang benar
        $validation = \Config\Services::validation();

        // Set aturan validasi dengan benar
        $validation->setRules([
            'nama_karyawan' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama karyawan harus diisi.',
                    'min_length' => 'Nama karyawan minimal 3 karakter.',
                    'max_length' => 'Nama karyawan maksimal 255 karakter.'
                ]
            ]
        ]);

        // Jalankan validasi
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman edit dengan error
            return redirect()->to(base_url('editKaryawan/' . $id))
                            ->withInput()
                            ->with('errors', $validation->getErrors());
        }

        // Ambil data yang dikirim dari form
        $data = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan')
        ];

        // Update data di database berdasarkan ID
        $update = $model->update($id, $data);

        if ($update) {
            // Jika berhasil, tampilkan pesan sukses dan redirect
            session()->setFlashdata('success', 'Data karyawan berhasil diperbarui.');
            return redirect()->to(base_url('karyawanbaru'));
        } else {
            // Jika gagal, tampilkan pesan error
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui data.');
            return redirect()->to(base_url('editKaryawan/' . $id));
        }
    }

    public function deleteKaryawan($id)
    {
        $model = new KaryawanBaruModel();

        // Cek apakah data karyawan ada
        $karyawan = $model->find($id);

        if (!$karyawan) {
            return redirect()->to(base_url('karyawanbaru'))->with('error', 'Data karyawan tidak ditemukan.');
        }

        // Hapus data
        $model->delete($id);

        return redirect()->to(base_url('karyawanbaru'))->with('success', 'Data karyawan berhasil dihapus.');
    }
    // End of CRUD karyawan baru

    public function datakriteria() {
        $model = new DataKriteriaModel();
        $data['datakriteria'] = $model->findAll();

        echo view('templates/header');
        echo view('wp/datakriteria', $data);
        echo view('templates/footer');
    }

    public function penilaiankaryawan() {
        $model = new PenilaianKaryawanModel();
        $data['penilaiankaryawan'] = $model->getPenilaian();

        // Tambahkan header kolom kriteria untuk keperluan tampilan view
        $data['kriteria'] = $this->getAllKriteria();

        echo view('templates/header');
        echo view('wp/penilaiankaryawan', $data);
        echo view('templates/footer');
    }

    private function getAllKriteria() {
        $db = \Config\Database::connect();
        return $db->table('data_kriteria')
            ->select('nama_kriteria')
            ->orderBy('id', 'ASC') // Urutkan sesuai kebutuhan
            ->get()
            ->getResultArray();
    }

    public function vektor_s_v()
    {
        // Memuat model VektorSModel
        $kriteriaModel = new VektorSVModel();
    
        // Mengambil data penilaian yang sudah digrouping
        $penilaian = $kriteriaModel->getPenilaianGrouped();

        $vektorS = [];

        // Hitung nilai Vektor S untuk setiap karyawan
        foreach ($penilaian as $karyawan => $nilaiKriteria) {
            $si = 1; // Nilai awal untuk perkalian
            
            foreach ($nilaiKriteria as $kriteria) {
                $nilai = $kriteria['nilai'];
                $bobotNormalisasi = $kriteria['bobot_normalisasi'];
                $tipe = $kriteria['tipe']; // Benefit atau cost

                // Jika tipe adalah 'cost', gunakan bobot negatif
                if ($tipe === 'cost') {
                    $bobotNormalisasi = -$bobotNormalisasi;
                }

                // Hitung S_i untuk kriteria ini menggunakan pangkat dari bobot normalisasi
                $si *= pow($nilai, $bobotNormalisasi);
            }

            // Menyimpan hasil Vektor S
            $vektorS[] = [
                'nama_karyawan' => $karyawan,
                'vektor_s' => $si
            ];
        }

        // Hitung total dari semua Vektor S
        $totalVektorS = array_sum(array_column($vektorS, 'vektor_s'));

        // Pastikan total Vektor S tidak nol
        if ($totalVektorS == 0) {
            // Tangani kasus ketika total Vektor S nol, misalnya beri pesan error
            echo "Total Vektor S bernilai nol, pembagian tidak bisa dilakukan.";
            return;
        }

        // Hitung Vektor V untuk setiap karyawan
        $vektorV = [];
        foreach ($vektorS as $data) {
            $vektorV[] = [
                'nama_karyawan' => $data['nama_karyawan'],
                'vektor_s' => $data['vektor_s'],
                'vektor_v' => $data['vektor_s'] / $totalVektorS
            ];
        }

        // Kirim hasil Vektor S dan Vektor V ke view
        $data['vektorSV'] = $vektorV;

        // Menampilkan hasil di view
        echo view('templates/header');
        echo view('wp/vektorsv', $data);
        echo view('templates/footer');
    }

    public function perangkingan() {
        // Memuat model VektorSModel
        $vektorSModel = new VektorSVModel();
        
        // Ambil data penilaian karyawan per kriteria
        $penilaian = $vektorSModel->getPenilaianGrouped();

        $vektorS = [];
        // Hitung nilai Vektor S untuk setiap karyawan
        foreach ($penilaian as $karyawan => $nilaiKriteria) {
            $si = 1; // Nilai awal untuk perkalian
            foreach ($nilaiKriteria as $kriteria) {
                // Ambil nilai, bobot normalisasi dan tipe dari data kriteria
                $nilai = $kriteria['nilai'];
                $bobotNormalisasi = $kriteria['bobot_normalisasi'];
                $tipe = $kriteria['tipe']; // Benefit atau cost

                // Jika tipe adalah 'cost', gunakan bobot negatif
                if ($tipe === 'cost') {
                    $bobotNormalisasi = -$bobotNormalisasi;
                }

                // Hitung S_i untuk kriteria ini menggunakan pangkat dari bobot normalisasi
                $si *= pow($nilai, $bobotNormalisasi);
            }

            // Simpan nilai Vektor S untuk karyawan ini
            $vektorS[] = [
                'nama_karyawan' => $karyawan,
                'vektor_s' => $si
            ];
        }

        // Hitung total dari semua Vektor S
        $totalVektorS = array_sum(array_column($vektorS, 'vektor_s'));

        // Hitung Vektor V untuk setiap karyawan
        $vektorV = [];
        foreach ($vektorS as $data) {
            $vektorV[] = [
                'nama_karyawan' => $data['nama_karyawan'],
                'vektor_v' => $data['vektor_s'] / $totalVektorS
            ];
        }

        // Urutkan berdasarkan nilai Vektor V (dari yang terbesar)
        usort($vektorV, function ($a, $b) {
            return $b['vektor_v'] <=> $a['vektor_v'];
        });

        // Kirim hasil perangkingan ke view
        $data['perangkingan'] = $vektorV;

        // Menampilkan hasil di view
        echo view('templates/header');
        echo view('wp/perangkingan', $data);
        echo view('templates/footer');
    }

    public function hasilkeputusan()
    {
        // Memuat model VektorSModel
        $vektorSModel = new VektorSVModel();
        
        // Ambil data penilaian karyawan per kriteria
        $penilaian = $vektorSModel->getPenilaianGrouped();

        $vektorS = [];
        // Hitung nilai Vektor S untuk setiap karyawan
        foreach ($penilaian as $karyawan => $nilaiKriteria) {
            $si = 1; // Nilai awal untuk perkalian
            foreach ($nilaiKriteria as $kriteria) {
                // Ambil nilai, bobot normalisasi dan tipe dari data kriteria
                $nilai = $kriteria['nilai'];
                $bobotNormalisasi = $kriteria['bobot_normalisasi'];
                $tipe = $kriteria['tipe']; // Benefit atau cost

                // Jika tipe adalah 'cost', gunakan bobot negatif
                if ($tipe === 'cost') {
                    $bobotNormalisasi = -$bobotNormalisasi;
                }

                // Hitung S_i untuk kriteria ini menggunakan pangkat dari bobot normalisasi
                $si *= pow($nilai, $bobotNormalisasi);
            }

            // Simpan nilai Vektor S untuk karyawan ini
            $vektorS[] = [
                'nama_karyawan' => $karyawan,
                'vektor_s' => $si
            ];
        }

        // Hitung total dari semua Vektor S
        $totalVektorS = array_sum(array_column($vektorS, 'vektor_s'));

        // Hitung Vektor V untuk setiap karyawan
        $vektorV = [];
        foreach ($vektorS as $data) {
            $vektorV[] = [
                'nama_karyawan' => $data['nama_karyawan'],
                'vektor_v' => $data['vektor_s'] / $totalVektorS
            ];
        }

        // Kirim hasil perangkingan ke view
        $data['perangkingan'] = $vektorV;

        // Urutkan data berdasarkan Vektor V dari yang terbesar
        usort($data['perangkingan'], function ($a, $b) {
            return $b['vektor_v'] <=> $a['vektor_v'];
        });

        // Menambahkan kolom keputusan berdasarkan ranking
        foreach ($data['perangkingan'] as $index => &$karyawan) {
            $karyawan['keputusan'] = ($index < 5) ? 'Diterima' : 'Gugur'; // Rank 1-5 diterima
        }

        // Kirim hasil keputusan ke view
        echo view('templates/header');
        echo view('wp/hasilkeputusan', $data);
        echo view('templates/footer');
    }
}
