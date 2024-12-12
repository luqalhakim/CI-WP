        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">
                    Copyright © 2024 Axima. All rights reserved.
                </span>
            </div>
        </footer>
        <!-- plugins:js -->
        <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
        <script src="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
        <!-- Plugin js for this page -->
        <script src="<?= base_url('assets/vendors/chart.js/chart.umd.js') ?>"></script>
        <script src="<?= base_url('assets/vendors/progressbar.js/progressbar.min.js') ?>"></script>
        <!-- inject:js -->
        <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
        <script src="<?= base_url('assets/js/template.js') ?>"></script>
        <script src="<?= base_url('assets/js/settings.js') ?>"></script>
        <script src="<?= base_url('assets/js/hoverable-collapse.js') ?>"></script>
        <script src="<?= base_url('assets/js/todolist.js') ?>"></script>
        <!-- Custom js for this page-->
        <script src="<?= base_url('assets/js/jquery.cookie.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
        <script src="<?= base_url('assets/js/collapse.js') ?>"></script>
        <script>
            function confirmDelete(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = "<?= base_url('deleteKaryawan'); ?>/" + id;
                }
            }
        s</script>
</body>
</html>
