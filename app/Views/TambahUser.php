<?= $this->extend('layout/BaseView') ?>

<?= $this->section('content') ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('component/Sidebar') ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('layout/topBar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data User</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $action ?>" method="POST">
                                <input name="id_petugas" type="hidden" class="form-control" id="id_petugas" value="<?php echo $dataUser->id_petugas; ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama</label>
                                    <input name="nama_petugas" type="text" class="form-control" id="nama_petugas" value="<?php echo $dataUser->nama_petugas; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Jabatan</label>
                                        <select id="jabatan_petugas" class="form-control" name="jabatan_petugas" required>
                                            <option value="Admin" <?php echo $dataUser->jabatan_petugas == "Admin" ? 'selected' : '' ?>>Admin</option>
                                            <option value="User" <?php echo $dataUser->jabatan_petugas == "User" ? 'selected' : '' ?>>User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Username</label>
                                    <input name="username_petugas" type="text" class="form-control" id="username_petugas" value="<?php echo $dataUser->username_petugas; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input name="password_petugas" type="Password" class="form-control" id="password_petugas" value="" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Alamat</label>
                                    <input name="alamat_petugas" type="text" class="form-control" id="alamat_petugas" value="<?php echo $dataUser->alamat_petugas; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nomor Telp</label>
                                    <input name="no_telp_petugas" type="text" class="form-control" id="no_telp_petugas" value="<?php echo $dataUser->no_telp_petugas; ?>" required>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<?= $this->endSection() ?>
