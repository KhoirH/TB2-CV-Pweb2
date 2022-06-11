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
                    <h1 class="h3 mb-2 text-gray-800">Anggota</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>

                            <!-- Topbar Search -->
                            <div class="d-none d-sm-inline-block">
                                <!-- Topbar Search -->
                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo base_url().'/Anggota/Search'; ?>" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Kode Anggota" aria-label="Search" aria-describedby="basic-addon2">
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kode Anggota</th>
                                            <th>Jurusan</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                                                <th>Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach($data as $index => $value) { ?>
                                            <tr>
                                                <td><?php echo $index+1 ?></td>
                                                <td><?php echo $value->nama_anggota; ?></td>
                                                <td><?php echo $value->kode_anggota; ?></td>
                                                <td><?php echo $value->jurusan_anggota; ?></td>
                                                <td><?php echo $value->alamat_anggota; ?></td>
                                                <td><?php echo $value->no_telp_anggota; ?></td>
                                                <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                                                    <td align="center">
                                                        <a href="<?php echo base_url().'/Anggota/EditAnggota/'.$value->id_anggota ?>"><i class="fas fa-edit"></i></a>
                                                        <a href="<?php echo base_url().'/Anggota/HapusAnggota/'.$value->id_anggota ?>"><i class="fas fa-trash"></i></a>
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