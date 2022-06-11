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
                    <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Buku</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $action ?>" method="POST">
                                <input name="id_buku" type="hidden" class="form-control" id="inputEmail4" value="<?php echo $dataBuku->id_buku ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Kode Buku</label>
                                    <input name="kode_buku" type="text" class="form-control" id="inputEmail4" value="<?php echo $dataBuku->kode_buku ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Judul Buku</label>
                                    <input name="judul_buku" type="text" class="form-control" id="inputPassword4" value="<?php echo $dataBuku->judul_buku ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="penulis-buku">Penulis Buku</label>
                                    <input name="penulis_buku" type="text" class="form-control" id="penulis-buku" value="<?php echo $dataBuku->penulis_buku ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="penerbit-buku">Penerbit Buku</label>
                                    <input name="penerbit_buku" type="text" class="form-control" id="penerbit-buku" value="<?php echo $dataBuku->penerbit_buku ?>" required>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="tahun-penerbit">Tahun Penerbitan</label>
                                    <input name="tahun_penerbit" type="number" min="1900" max="2099" step="1" class="form-control" id="tahun-penerbit" value="<?php echo $dataBuku->tahun_penerbit ?: date('Y') ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="rak">Rak</label>
                                    <select id="rak" class="form-control" name="id_rak" required>
                                        <?php foreach($dataRak as $value) { ?>
                                            <option value="<?php echo $value->id_rak ?>" <?php echo $value->id_rak == $dataBuku->id_rak || $value->id_rak == 1 ? 'selected' : '' ?>><?php echo $value->nama_rak ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="harga_per_hari">Harga Perhari (Rp)</label>
                                        <input name="harga_per_hari" type="number" step="1000" min="1000" class="form-control" id="harga_per_hari" value="<?php echo $dataBuku->harga_per_hari ?: 1000 ?>" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="stok">Stok</label>
                                        <input name="stok" type="number" step="1" min="1" class="form-control" id="stok" value="<?php echo isset($dataBuku->stok) ? $dataBuku->stok : 1 ?>" required>
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
