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
          </ul>
        </div>
        
        <!-- Form Update -->
        <div class="container mt-3">
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-header">
                            Form Update Karyawan
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                        <p><?= $error ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($karyawan) && isset($karyawan['id'])) : ?>
                            <!-- Form Update -->
                            <form action="<?= base_url('updateKaryawan/'.$karyawan['id']); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="<?= old('nama_karyawan', $karyawan['nama_karyawan']); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary text-white">
                                    <i class="mdi mdi-upload menu-icon"></i>Update
                                </button>
                            </form>
                            <?php else: ?>
                                <div class="alert alert-danger">Data karyawan tidak ditemukan.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Form -->
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->