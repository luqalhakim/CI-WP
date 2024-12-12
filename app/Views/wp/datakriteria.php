<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active ps-0"
                id="home-tab"
                data-bs-toggle="tab"
                href="#overview"
                role="tab"
                aria-controls="overview"
                aria-selected="true"
                >Overview</a
              >
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link text-dark text-decoration-none fs-6" href="#">
                <i class="mdi mdi-plus-circle-outline menu-icon"></i>
                Tambah Data</a
              >
            </li> -->
          </ul>
        </div>
        <!-- Table -->
        <h4 class="mt-3">Data Bobot Setiap Kriteria</h4>
        <div class="container mt-3">
          <div class="table-responsive">
              <table class="table table-hover w-auto">
                  <thead class="table-dark">
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Kriteria</th>
                          <th scope="col">Bobot</th>
                          <th scope="col">Bobot Normalisasi</th>
                          <th scope="col">Tipe</th>
                          <!-- <th scope="col">Action</th> -->
                      </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($datakriteria)): ?>
                          <?php foreach ($datakriteria as $index => $data): ?>
                              <tr>
                                  <td><?= $index + 1; ?></td>
                                  <td><?= $data['nama_kriteria']; ?></td>
                                  <td><?= $data['bobot']; ?></td>
                                  <td><?= $data['bobot_normalisasi']; ?></td>
                                  <td><?= $data['tipe']; ?></td>
                                  <!-- <td class="d-flex">
                                    <a class="nav-link text-dark text-decoration-none fs-4" href="#">
                                      <i class="mdi mdi-pencil-outline menu-icon"></i>
                                    </a>
                                    <a class="nav-link text-dark text-decoration-none fs-4 ms-2" href="#d">
                                      <i class="mdi mdi-delete-outline menu-icon"></i>
                                    </a>
                                  </td> -->
                              </tr>
                          <?php endforeach; ?>
                      <?php else: ?>
                          <tr>
                              <td colspan="9" class="text-center">Tidak ada data karyawan baru.</td>
                          </tr>
                      <?php endif; ?>
                  </tbody>
              </table>
          </div>
        </div>
        <!-- End of Table -->
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->