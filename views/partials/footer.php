<?php if (isset($_SESSION['error-message'])) {
    $error_message =  $_SESSION['error-message'];?>

        <script async="false">alert("<?= $error_message ?>");</script>

<?php unset($_SESSION['error-message']); } ?>
        <!-- build:js assets/vendor/js/core.js -->
        <script src="<?= $dirname ?? null ?>assets/vendor/libs/jquery/jquery.js"></script>
        <script src="<?= $dirname ?? null ?>assets/vendor/libs/popper/popper.js"></script>
        <script src="<?= $dirname ?? null ?>assets/vendor/js/bootstrap.js"></script>
        <script src="<?= $dirname ?? null ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?= $dirname ?? null ?>assets/vendor/js/menu.js"></script>

        <!-- Main JS -->
        <script src="<?= $dirname ?? null ?>assets/js/main.js"></script>

        <!-- Vendors JS -->
        <script src="<?= $dirname ?? null ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Page JS -->
        <script src="<?= $dirname ?? null ?>assets/js/ui-modals.js"></script>

        <!-- Page JS -->
        <script src="<?= $dirname ?? null ?>assets/js/dashboards-analytics.js"></script>
    </body>
</html>

