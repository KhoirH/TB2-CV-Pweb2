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
                    <!-- Button view -->
                    <div class="pb-4 d-flex" style="gap:10px;">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-form">Tambah CV</button>
                        <!-- <button type="button" class="btn btn-outline-success">Import List CV</button> -->
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export List
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= base_url('curriculum-vitae/export-excel')?>">Excel</a>
                                <a class="dropdown-item" href="<?= base_url('curriculum-vitae/export-pdf')?>">PDF</a>
                            </div>
                        </div>
                    </div>
                   <!-- DataTales Example -->
                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tempat, Tanggal lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Handphone</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;?>
                                    <?php foreach($all_mahasiswa as $mahasiswa):?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $mahasiswa->nama ?></td>
                                            <td><?= $mahasiswa->tempat_lahir.",".$mahasiswa->tanggal_lahir ?></td>
                                            <td><?= $mahasiswa->jenis_kelamin ?></td>
                                            <td><?= $mahasiswa->no_hp ?></td>
                                            <td><?= $mahasiswa->email ?></td>
                                            <td>
                                                <a href="curriculum-vitae/export-pdf-mahasiswa/<?= $mahasiswa->id_mahasiswa ?>"  class="btn btn-primary btn-sm" >
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <button type="button" data="<?= str_replace('"',"'",json_encode($mahasiswa)) ?>" class="btn btn-success btn-sm btn-edit" >
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="curriculum-vitae/delete/<?= $mahasiswa->id_mahasiswa ?>"  class="btn btn-danger btn-sm" >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach;?>
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
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Modal -->
    
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <form method="POST" action="<?= base_url('curriculum-vitae/add-cv') ?>" id="form">
            <input type="hidden" value="insert" name="type_form"/>
            <input type="hidden" value="" name="id_mahasiswa"/>
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="modal-form-title">Formulir </h3>
                    <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h5 class="text-dark"><b>Data diri</b></h5>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="tempat-lahir">Tempat, tanggal lahir</label>
                                    <div class='d-flex' style="gap:5px;">
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat-lahir"  placeholder="Masukan tempat">
                                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal-lahir"  placeholder="Masukan email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" class="form-control" id="agama" placeholder="Masukan agama">
                                </div>
                                
                                <div class="form-group">
                                    <label for="handphone">Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" id="handphone" placeholder="Masukan no handphone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis-kelamin" name="jenis_kelamin">
                                        <option value="laki-laki" selected>Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="belum menikah" selected>Belum Menikah</option>
                                        <option value="menikah">Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Masukan alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tentang_saya">Tentang saya</label>
                                    <textarea class="form-control" id="tentang_saya" rows="3" name="tentang_saya" placeholder="Masukan disini"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div>
                        <h5 class="text-dark"><b>Pendidikan</b></h5>
                        <div id="wrap-pendidikan">
                            <div class="d-flex" style="gap:5px;">
                                <div class="form-group">
                                    <label for="nama-pendidikan">Jenis Pendidikan</label>
                                    <input type="text" class="form-control" name="nama_pendidikan[]" id="nama-pendidikan" placeholder="Masukan disini">
                                </div>
                                <div class="form-group">
                                    <label for="tipe-pendidikan">Tipe</label>
                                    <select class="form-control" id="tipe-pendidikan" name="tipe_pendidikan[]">
                                        <option value="formal" selected>Formal</option>
                                        <option value="non-formal">Non Formal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat-pendidikan">Sekolah</label>
                                    <input type="text" class="form-control" name="tempat_pendidikan[]" id="tempat-pendidikan" placeholder="Masukan disini">
                                </div>
                                <div class="form-group">
                                    <label for="waktu-pendidikan">Waktu Pendidikan</label>
                                    <input type="text" class="form-control" id="waktu-pendidikan" name="waktu_pendidikan[]" placeholder="Masukan disini">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btn-add-pendidikan" class="btn btn-primary btn-sm" >
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <hr/>
                    <div>
                        <h5 class="text-dark"><b>Pengalaman</b></h5>
                        
                        <div id="wrap-pengalaman">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pengalaman[]" id="pengalaman" placeholder="Masukan disini">
                            </div>
                        </div>
                        
                        <button type="button" id="btn-add-pengalaman" class="btn btn-primary btn-sm" >
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <hr/>
                    <div>
                        <h5 class="text-dark"><b>Kemampuan</b></h5>
                        
                        <div id="wrap-kemampuan">
                            <div class="d-flex" style="gap:5px;">
                                <div class="form-group w-100">
                                    <label for="kategori-kemampuan">Kategori Kemampuan</label>
                                    <input type="text" class="form-control" name="kategori_kemampuan[]" id="kategori-kemampuan" placeholder="Masukan disini">
                                </div>
                                <div class="form-group w-100">
                                    <label for="sub-kategori-kemampuan">Sub-Kategori Kemampuan</label>
                                    <input type="text" class="form-control" name="sub_kategori_kemampuan[]" id="sub-kategori-kemampuan" placeholder="Masukan disini">
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="btn-add-kemampuan" class="btn btn-primary btn-sm" >
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </form>
    </div>
    <script >
        $('#modal-form').on('hidden.bs.modal', function (e) {
            $('#form').html(`<input type="hidden" value="insert" name="type_form"/>
            <input type="hidden" value="" name="id_mahasiswa"/>
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="modal-form-title">Formulir </h3>
                    <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h5 class="text-dark"><b>Data diri</b></h5>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="tempat-lahir">Tempat, tanggal lahir</label>
                                    <div class='d-flex' style="gap:5px;">
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat-lahir"  placeholder="Masukan tempat">
                                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal-lahir"  placeholder="Masukan email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" class="form-control" id="agama" placeholder="Masukan agama">
                                </div>
                                
                                <div class="form-group">
                                    <label for="handphone">Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" id="handphone" placeholder="Masukan no handphone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis-kelamin" name="jenis_kelamin">
                                        <option value="laki-laki" selected>Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="belum menikah" selected>Belum Menikah</option>
                                        <option value="menikah">Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Masukan alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tentang_saya">Tentang saya</label>
                                    <textarea class="form-control" id="tentang_saya" rows="3" name="tentang_saya" placeholder="Masukan disini"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div>
                        <h5 class="text-dark"><b>Pendidikan</b></h5>
                        <div id="wrap-pendidikan">
                            <div class="d-flex" style="gap:5px;">
                                <div class="form-group">
                                    <label for="nama-pendidikan">Jenis Pendidikan</label>
                                    <input type="text" class="form-control" name="nama_pendidikan[]" id="nama-pendidikan" placeholder="Masukan disini">
                                </div>
                                <div class="form-group">
                                    <label for="tipe-pendidikan">Tipe</label>
                                    <select class="form-control" id="tipe-pendidikan" name="tipe_pendidikan[]">
                                        <option value="formal" selected>Formal</option>
                                        <option value="non-formal">Non Formal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat-pendidikan">Sekolah</label>
                                    <input type="text" class="form-control" name="tempat_pendidikan[]" id="tempat-pendidikan" placeholder="Masukan disini">
                                </div>
                                <div class="form-group">
                                    <label for="waktu-pendidikan">Waktu Pendidikan</label>
                                    <input type="text" class="form-control" id="waktu-pendidikan" name="waktu_pendidikan[]" placeholder="Masukan disini">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btn-add-pendidikan" class="btn btn-primary btn-sm" >
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <hr/>
                    <div>
                        <h5 class="text-dark"><b>Pengalaman</b></h5>
                        
                        <div id="wrap-pengalaman">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pengalaman[]" id="pengalaman" placeholder="Masukan disini">
                            </div>
                        </div>
                        
                        <button type="button" id="btn-add-pengalaman" class="btn btn-primary btn-sm" >
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <hr/>
                    <div>
                        <h5 class="text-dark"><b>Kemampuan</b></h5>
                        
                        <div id="wrap-kemampuan">
                            <div class="d-flex" style="gap:5px;">
                                <div class="form-group w-100">
                                    <label for="kategori-kemampuan">Kategori Kemampuan</label>
                                    <input type="text" class="form-control" name="kategori_kemampuan[]" id="kategori-kemampuan" placeholder="Masukan disini">
                                </div>
                                <div class="form-group w-100">
                                    <label for="sub-kategori-kemampuan">Sub-Kategori Kemampuan</label>
                                    <input type="text" class="form-control" name="sub_kategori_kemampuan[]" id="sub-kategori-kemampuan" placeholder="Masukan disini">
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="btn-add-kemampuan" class="btn btn-primary btn-sm" >
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>`);

        })
        function pengalamanView(value) {
            return `<div class='form-group'><input type='hidden' name='id_pengalaman[]' value='${value.id_pengalaman}'/><input type='text' class='form-control' name='pengalaman[]' value='${value.pengalaman}' id='pengalaman' placeholder='Masukan disini'></div>`
        }
        function kemampuanView(value) {
            return `<div class='d-flex' style='gap:5px;'><input type='hidden' name='id_kemampuan[]' value='${value.id_kemampuan}'/><div class='form-group w-100'><label for='kategori-kemampuan'>Kategori Kemampuan</label><input type='text' class='form-control' value='${value.kategori_kemampuan}' name='kategori_kemampuan[]' id='kategori-kemampuan' placeholder='Masukan disini'></div><div class='form-group w-100'><label for='sub-kategori-kemampuan'>Sub-Kategori Kemampuan</label><input type='text' class='form-control' value='${value.sub_kategori_kemampuan}'  name='sub_kategori_kemampuan[]' id='sub-kategori-kemampuan' placeholder='Masukan disini'></div></div>`
        }
        function pendidikanView(value) {
            return `<div class='d-flex' style='gap:5px;'><input type='hidden' name='id_pendidikan[]' value='${value.id_pendidikan}'/><div class='form-group'><label for='nama-pendidikan'>Jenis Pendidikan</label><input type='text' class='form-control' value='${value.nama_pendidikan}' name='nama_pendidikan[]' id='nama-pendidikan' placeholder='Masukan disini'></div><div class='form-group'><label for='tipe-pendidikan'>Tipe</label><select class='form-control' id='tipe-pendidikan' value='${value.tipe_pendidikan}' name='tipe_pendidikan[]'>    <option value='formal' selected>Formal</option>    <option value='non-formal'>Non Formal</option></select></div><div class='form-group'><label for='tempat-pendidikan'>Sekolah</label><input type='text' class='form-control'  value='${value.tempat_pendidikan}' name='tempat_pendidikan[]' id='tempat-pendidikan' placeholder='Masukan disini'></div><div class='form-group'><label for='waktu-pendidikan'>Waktu Pendidikan</label><input type='text' class='form-control' id='waktu-pendidikan' value='${value.waktu_pendidikan}' name='waktu_pendidikan[]' placeholder='Masukan disini'></div></div>`
        }
        $(document).ready(function(){
            $('#btn-add-pengalaman').click(function(){
                $('#wrap-pengalaman').append("<div class='form-group'><input type='text' class='form-control' name='pengalaman[]' id='pengalaman' placeholder='Masukan disini'></div>");
            })
            $('#btn-add-kemampuan').click(function(){
                $('#wrap-kemampuan').append("<div class='d-flex' style='gap:5px;'><div class='form-group w-100'><label for='kategori-kemampuan'>Kategori Kemampuan</label><input type='text' class='form-control' name='kategori_kemampuan[]' id='kategori-kemampuan' placeholder='Masukan disini'></div><div class='form-group w-100'><label for='sub-kategori-kemampuan'>Sub-Kategori Kemampuan</label><input type='text' class='form-control' name='sub_kategori_kemampuan[]' id='sub-kategori-kemampuan' placeholder='Masukan disini'></div></div>");
            })
            $('#btn-add-pendidikan').click(function(){
                $('#wrap-pendidikan').append("<div class='d-flex' style='gap:5px;'><div class='form-group'><label for='nama-pendidikan'>Jenis Pendidikan</label><input type='text' class='form-control' name='nama_pendidikan[]' id='nama-pendidikan' placeholder='Masukan disini'></div><div class='form-group'><label for='tipe-pendidikan'>Tipe</label><select class='form-control' id='tipe-pendidikan' name='tipe_pendidikan[]'>    <option value='formal' selected>Formal</option>    <option value='non-formal'>Non Formal</option></select></div><div class='form-group'><label for='tempat-pendidikan'>Sekolah</label><input type='text' class='form-control' name='tempat_pendidikan[]' id='tempat-pendidikan' placeholder='Masukan disini'></div><div class='form-group'><label for='waktu-pendidikan'>Waktu Pendidikan</label><input type='text' class='form-control' id='waktu-pendidikan' name='waktu_pendidikan[]' placeholder='Masukan disini'></div></div>");
            })
            $('.btn-edit').click(function(){
                data = JSON.parse($(this).attr('data').split("'").join('"'));
                dataArray = Object.entries(data);
                $(`#form [name='type_form']`).val('edit');

                for(index = 0; index < dataArray.length; index++) {
                    $(`#form [name=${dataArray[index][0]}]`).val(dataArray[index][1]);
                    if(dataArray[index][0] === 'tipe_pendidikan' ) {
                        break;
                    }
                }
                if(data.id_pendidikan) {
                    idPendidikanArray = data.id_pendidikan.split('[,]');
                    tipePendidikanArray = data.tipe_pendidikan.split('[,]');
                    tempatPendidikanArray = data.tempat_pendidikan.split('[,]');
                    waktuPendidikanArray = data.waktu_pendidikan.split('[,]');
                    namaPendidikanArray = data.nama_pendidikan.split('[,]');
                    htmlPendidikan = '';
                    for(index = 0; index < idPendidikanArray.length; index++) {
                        idPendidikan = idPendidikanArray[index];
                        tipePendidikan = tipePendidikanArray[index];
                        tempatPendidikan = tempatPendidikanArray[index];
                        waktuPendidikan = waktuPendidikanArray[index];
                        namaPendidikan = namaPendidikanArray[index];
                        htmlPendidikan += pendidikanView({
                            id_pendidikan: idPendidikan,
                            tipe_pendidikan: tipePendidikan,
                            tempat_pendidikan: tempatPendidikan,
                            waktu_pendidikan: waktuPendidikan,
                            nama_pendidikan: namaPendidikan,
                        })
                    }
                    $('#wrap-pendidikan').html(htmlPendidikan)
                }
                if(data.id_kemampuan) {
                    idKemampuanArray = data.id_kemampuan.split('[,]');
                    kategoriKemampuanArray = data.kategori_kemampuan.split('[,]');
                    subKategoriKemampuanArray = data.sub_kategori_kemampuan.split('[,]');
                    htmlKemampuan = '';
                    for(index = 0; index < idKemampuanArray.length; index++) {
                        idKemampuan = idKemampuanArray[index];
                        kategoriKemampuan = kategoriKemampuanArray[index];
                        subKategoriKemampuan = subKategoriKemampuanArray[index];
                        htmlKemampuan += kemampuanView({
                            id_kemampuan: idKemampuan,
                            kategori_kemampuan: kategoriKemampuan,
                            sub_kategori_kemampuan: subKategoriKemampuan,
                        })
                    }
                    $('#wrap-kemampuan').html(htmlKemampuan)
                }
                
                if(data.id_pengalaman) {
                    idPengalamanArray = data.id_pengalaman.split('[,]');
                    pengalamanArray = data.pengalaman.split('[,]');
                    htmlPengalaman = '';
                    for(index = 0; index < idPengalamanArray.length; index++) {
                        idPengalaman = idPengalamanArray[index];
                        pengalaman = pengalamanArray[index];
                        htmlPengalaman += pengalamanView({
                            id_pengalaman: idPengalaman,
                            pengalaman: pengalaman,
                        })
                    }
                    $('#wrap-pengalaman').html(htmlPengalaman)
                }
                $('#modal-form').modal('show');
            })
            
        });
    </script>
<?= $this->endSection() ?>