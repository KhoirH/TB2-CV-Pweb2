<!DOCTYPE html>
<html lang="en">

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
    <link href="<?php base_url() ?>/template/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if (session()->getFlashdata('item')) : ?>
                                        <div class="col-lg-12 mb-4">
                                            <div class="card bg-danger text-white shadow">
                                                <div class="card-body">
                                                    Account is not Avaliable
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;  ?>
                                    <form class="user" action="<?= base_url('login/save'); ?>" method="POST" >
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="user"
                                                placeholder="User">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url() ?>/template/libs/jquery/jquery.min.js"></script>
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