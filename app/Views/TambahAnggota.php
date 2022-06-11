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
                    <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Anggota</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $action ?>" method="POST">
                                <input name="id_anggota" type="hidden" class="form-control" id="id_anggota" value="<?php echo $dataAnggota->id_anggota; ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nama</label>
                                        <input name="nama_anggota" type="text" class="form-control" id="nama_anggota" value="<?php echo $dataAnggota->nama_anggota; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Kode</label>
                                        <input name="kode_anggota" type="text" class="form-control" id="kode_anggota" value="<?php echo $dataAnggota->kode_anggota; ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="inputPassword4">Jurusan</label>
                                        <select id="jurusan_anggota" class="form-control" name="jurusan_anggota" required>
                                            <option value="Informatika" <?php echo $dataAnggota->jurusan_anggota == "Informatika" ? 'selected' : ''; ?> >Informatika</option>
                                            <option value="Mesin" <?php echo $dataAnggota->jurusan_anggota == "Mesin" ? 'selected' : ''; ?> >Mesin</option>
                                            <option value="Sipil" <?php echo $dataAnggota->jurusan_anggota == "Sipil" ? 'selected' : ''; ?> >Sipil</option>
                                        </select>
                                    </div>                                    
                                </div>

                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Alamat</label>
                                        <input name="alamat_anggota" type="text" class="form-control" id="alamat_anggota" value="<?php echo $dataAnggota->alamat_anggota; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nomor Telp</label>
                                        <input name="no_telp_anggota" type="text" class="form-control" id="no_telp_anggota" value="<?php echo $dataAnggota->no_telp_anggota; ?>" required>
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

