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
                    <h1 class="h3 mb-2 text-gray-800">Pengembalian</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengembalian Buku</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('pengembalian'); ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kode_peminjaman">Kode Peminjaman</label>
                                        <input type="email" name="kode_pinjaman" class="form-control" id="kode_peminjaman" readonly="true" value="<?php echo $dataPeminjaman->kode_peminjaman ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id_pinjaman" class="form-control" id="kode_peminjaman" readonly="true" value="<?php echo $dataPeminjaman->id_peminjaman ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="peminjam">Peminjam</label>
                                        <input type="email" name="peminjam" class="form-control" id="peminjam" readonly="true" value="<?php echo $dataPeminjaman->nama_anggota ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <input type="email" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" readonly="true" value="<?php echo $dataPeminjaman->tanggal_pinjam ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="estimasi_tanggal_kembali">Tanggal Kembali (Estimasi)</label>
                                        <input type="email" name="tanggal_estimasi" class="form-control" id="estimasi_tanggal_kembali" readonly="true" value="<?php echo $dataPeminjaman->tanggal_kembali ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="kode_peminjaman">Tanggal Kembali (Aktual)</label>
                                        <input type="email" name="tanggal_kembali" class="form-control" id="kode_peminjaman" readonly="true" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="kode_peminjaman">Total Terlambat (Hari)</label>
                                        <input type="email" name="terlambat" class="form-control" id="kode_peminjaman" readonly="true" value="<?php echo $totalHariTerlambat ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="kode_peminjaman">Total Denda (Rp)</label>
                                        <input type="email" name="total_denda" class="form-control" id="kode_peminjaman" readonly="true" value="<?php echo $totalDenda ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="kode_peminjaman">Total Bayar (Rp)</label>
                                        <input type="email" name="total_bayar" class="form-control" id="kode_peminjaman" readonly="true" value="<?php echo $totalBayar ?>">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
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
