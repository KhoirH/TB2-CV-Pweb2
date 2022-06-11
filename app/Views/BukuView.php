
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
                    <h1 class="h3 mb-2 text-gray-800">Buku</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>

                            <!-- Topbar Search -->
                            <div class="d-none d-sm-inline-block">
                                <!-- Topbar Search -->
                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo base_url().'/Buku/Search'; ?>" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Kode Buku" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis Buku</th>
                                            <th>Penerbit Buku</th>
                                            <th>Tahun Penerbit</th>
                                            <th>Rak</th>
                                            <th>Stok</th>
                                            <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                                                <th>Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $index => $value) { ?>
                                            <tr>
                                                <td><?php echo $index+1 ?></td>
                                                <td><?php echo $value->kode_buku ?></td>
                                                <td><?php echo $value->judul_buku ?></td>
                                                <td><?php echo $value->penulis_buku ?></td>
                                                <td><?php echo $value->penerbit_buku ?></td>
                                                <td><?php echo $value->tahun_penerbit ?></td>
                                                <td><?php echo $value->nama_rak ?></td>
                                                <td align="center"><?php echo $value->stok ?></td>
                                                <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                                                    <td align="center">
                                                        <a href="<?php echo base_url().'/Buku/EditBuku/'.$value->id_buku ?>"><i class="fas fa-edit"></i></a>
                                                        <a href="<?php echo base_url().'/Buku/HapusBuku/'.$value->id_buku ?>"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
