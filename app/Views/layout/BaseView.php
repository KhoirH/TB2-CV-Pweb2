<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php base_url() ?>/template/libs/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php base_url() ?>/template/css/font.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php base_url() ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <script  src="<?php base_url() ?>/template/libs/jquery/jquery.min.js"></script>
    <?= $this->renderSection('content') ?>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url() ?>/template/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php base_url() ?>/template/libs/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php base_url() ?>/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php base_url() ?>/template/libs/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php base_url() ?>/template/js/demo/chart-area-demo.js"></script>
    <script src="<?php base_url() ?>/template/js/demo/chart-pie-demo.js"></script>
</body>
</html>