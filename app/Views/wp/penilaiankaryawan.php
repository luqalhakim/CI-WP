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
        <h4 class="mt-3">Data Penilaian dari Karyawan Baru</h4>
        <div class="container mt-3">
          <div class="table-responsive">
              <table class="table table-bordered w-auto">
                  <thead class="table-dark">
                      <tr>
                          <th scope="col">No</th>
                          <th>Nama Karyawan Baru</th>
                          <?php foreach ($kriteria as $k): ?>
                              <th><?= $k['nama_kriteria']; ?></th>
                          <?php endforeach; ?>
                          <!-- <th scope="col">Action</th> -->
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($penilaiankaryawan as $index => $row): ?>
                          <tr>
                              <td><?= $index + 1; ?></td>
                              <td><?= $row['nama_karyawan']; ?></td>
                              <?php foreach ($kriteria as $k): ?>
                                  <td><?= $row[$k['nama_kriteria']] ?? '-'; ?></td>
                              <?php endforeach; ?>
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