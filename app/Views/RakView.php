<?= $this->extend('layout/BaseView') ?>

<?= $this->section('content') ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Perpustakaan</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-buku" aria-expanded="true" aria-controls="menu-buku">
                <i class="fas fa-fw fa-book"></i>
                <span>Buku</span>
            </a>
            <div id="menu-buku" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/Buku' ?>">List Buku</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/Buku/Tambah' ?>">Tambah Buku</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-user" aria-expanded="true" aria-controls="menu-user">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
            <div id="menu-user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/User' ?>">List User</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/User/Tambah' ?>">Tambah User</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-rak" aria-expanded="true" aria-controls="menu-rak">
                <i class="fas fa-fw fa-user"></i>
                <span>Rak</span>
            </a>
            <div id="menu-rak" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/Rak' ?>">List Rak</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/Rak/Tambah' ?>">Tambah Rak</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-pinjaman-buku" aria-expanded="true" aria-controls="menu-pinjaman-buku">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Peminjaman Buku</span>
            </a>
            <div id="menu-pinjaman-buku" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/PeminjamanBuku' ?>">List Peminjaman</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/PeminjamanBuku/Pinjam' ?>">Peminjaman Buku</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() . '/Pengembalian' ?>">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Pengembalian Buku</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

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
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?php echo base_url() . '/Rak/Search'; ?>" method="GET">
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
                                        <th>Rak</th>
                                        <th>Lokasi</th>
                                        <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $index => $value) { ?>
                                        <tr>
                                            <td><?php echo $index + 1 ?></td>
                                            <td><?php echo $value->nama_rak ?></td>
                                            <td><?php echo $value->lokasi_rak ?></td>
                                            <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                                                <td align="center">
                                                    <a href="<?php echo base_url() . '/Rak/EditRak/' . $value->id_rak ?>"><i class="fas fa-edit"></i></a>
                                                    <a href="<?php echo base_url() . '/Rak/HapusRak/' . $value->id_rak ?>"><i class="fas fa-trash"></i></a>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url() . '/login' ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>