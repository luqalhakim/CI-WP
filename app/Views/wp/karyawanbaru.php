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
                class="nav-link text-dark text-decoration-none ps-0 fs-6"
                href="<?= base_url('karyawanbaru');?>"
                >Overview</a
              >
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark text-decoration-none fs-6" href="<?= base_url('createkaryawan') ?>">
                    <i class="mdi mdi-plus-circle-outline menu-icon"></i> Tambah Data
                </a>
            </li>
          </ul>
        </div>
        
        <!-- Table -->
        <h4 class="mt-3">Data Karyawan Baru</h4>
        <div class="container mt-3">
          <div class="table-responsive">
              <table class="table table-hover w-auto">
                  <thead class="table-dark">
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Karyawan</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($karyawan)): ?>
                          <?php foreach ($karyawan as $index => $data): ?>
                              <tr>
                                  <td><?= $index + 1; ?></td>
                                  <td><?= $data['nama_karyawan']; ?></td>
                                  <td class="d-flex">
                                    <a class="nav-link text-dark text-decoration-none fs-4" href="<?= base_url('editkaryawan/'.$data['id']); ?>">
                                      <i class="mdi mdi-pencil-outline menu-icon"></i>
                                    </a>
                                    <a class="nav-link text-dark text-decoration-none fs-4 ms-2" href="#" onclick="confirmDelete(<?= $data['id']; ?>)">
                                        <i class="mdi mdi-delete-outline menu-icon"></i>
                                    </a>
                                  </td>
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

<script>
  