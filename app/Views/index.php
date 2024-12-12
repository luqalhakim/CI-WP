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
          </ul>
        </div>
        <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
              <div class="col-lg-3 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-primary card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white">Data Calon Karyawan</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <p class="status-summary-ight-white mb-3">Value</p>
                            <h2 class="text-info pb-3"><?= $jumlahKaryawan ?></h2>
                          </div>
                        </div>
                        <a class="btn btn-light border-0" href="<?= base_url('karyawanbaru'); ?>" role="button">More Info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-success card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white">Data Kriteria</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <p class="status-summary-ight-white mb-3">Value</p>
                            <h2 class="text-success-emphasis pb-2"><?= $jumlahKriteria ?></h2>
                          </div>
                        </div>
                        <a class="btn btn-light border-0" href="<?= base_url('datakriteria');?>" role="button">More Info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-danger card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white">Data Penilaian Karyawan</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <p class="status-summary-ight-white mb-3">Value</p>
                            <h2 class="text-danger-emphasis pb-2"><?= $jumlahKaryawan ?></h2>
                          </div>
                        </div>
                        <a class="btn btn-light border-0" href="<?= base_url('penilaiankaryawan');?>" role="button">More Info</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->