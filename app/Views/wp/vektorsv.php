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
        <!-- Table -->
        <h4 class="mt-3">Kalkulasi Nilai Vektor S & V</h4>
        <div class="container mt-3">
          <div class="table-responsive">
            <table class="table table-bordered w-auto">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Vektor S</th>
                        <th>Vektor V</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vektorSV as $index => $row): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $row['nama_karyawan']; ?></td>
                            <td><?= $row['vektor_s']; ?></td>
                            <td><?= $row['vektor_v']; ?></td>
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