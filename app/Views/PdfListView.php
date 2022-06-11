<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<style>
  body{ 
    font-family: sans-serif !important;
  }
  table.table-detail,.table-detail th,.table-detail td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
  }
  table.table-top,.table-top th,.table-top td {
    padding-right: 10px;
    padding-left: 0;
  }
  .table-top {
    padding-top: 10px;
    padding-bottom: 3px;
  }
  ol {
    padding: 0 0 0 25px;
  }
</style>
  <h2> Data Mahasiswa</h2>
    <?php foreach($all_mahasiswa as $mahasiswa):?>
        <?php 
        
          $tipe_pendidikan_array = explode("[,]", $mahasiswa->tipe_pendidikan);
          $tempat_pendidikan_array = explode("[,]", $mahasiswa->tempat_pendidikan);
          $waktu_pendidikan_array = explode("[,]", $mahasiswa->waktu_pendidikan);
          $nama_pendidikan_array = explode("[,]", $mahasiswa->nama_pendidikan);
          $pengalaman_array = explode("[,]", $mahasiswa->pengalaman);
          $kategori_kemampuan_array = explode("[,]", $mahasiswa->kategori_kemampuan);
          $sub_kategori_kemampuan_array = explode("[,]", $mahasiswa->sub_kategori_kemampuan);    
          
          $pengalamanHTML = "<ol>";
          $pendidikanHTML = "<ol>";
          $kemampuanHTML = "<ol>";

          $max_index = max( count($tipe_pendidikan_array ),  count($pengalaman_array), count($kategori_kemampuan_array));

          for($i = 0; $i < $max_index; $i++) {
              if($tipe_pendidikan_array[$i]) {
                  $pendidikanHTML .= "<li>".$tipe_pendidikan_array[$i]."-".$nama_pendidikan_array[$i]."-".$tempat_pendidikan_array[$i]."-".$waktu_pendidikan_array[$i]."</li>";
              }
              if($pengalaman_array[$i]){
                  $pengalamanHTML .= "<li>".$pengalaman_array[$i]."</li>";
              }
              if($kategori_kemampuan_array[$i]){
                  $kemampuanHTML .= "<li>".$kategori_kemampuan_array[$i]."-".$sub_kategori_kemampuan_array[$i]."</li>";
              }
          }
          $pendidikanHTML .= "</ol>";
          $pengalamanHTML .= "</ol>";
          $kemampuanHTML .= "</ol>";
        ?>
        <table class="table-top">
          <tr>
            <td><b>Nama Mahasiswa</b> : <?= $mahasiswa->nama?></td>
            <td><b>Kontak Email</b> : <?= $mahasiswa->email?></td>
            <td><b>Kontak No Handphone</b> : <?= $mahasiswa->no_hp?></td>
          </tr>  
        </table>
        <b style="padding-left: 2px; padding-bottom:4px; display:block;">Detail:</b>
        <table width="100%" cellspacing="0" class="table-detail">
          <thead>
              <tr>
                  <th>Tentang saya</th>
                  <th>Tempat, tanggal lahir</th>
                  <th>Agama</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th>Pendidikan</th>
                  <th>Pengalaman</th>
                  <th>Kemampuan</th>
              </tr>
          </thead>
          <tbody>
          <tr>
              <td><?= $mahasiswa->tentang_saya ?></td>
              <td><?= $mahasiswa->tempat_lahir.",".$mahasiswa->tanggal_lahir ?></td>
              <td><?= $mahasiswa->agama ?></td>
              <td><?= $mahasiswa->jenis_kelamin ?></td>
              <td><?= $mahasiswa->status ?></td>
              <td><?= $pendidikanHTML ?></td>
              <td><?= $pengalamanHTML ?></td>
              <td><?= $kemampuanHTML ?></td>
          </tr>
        </tbody>
      </table>
        <hr/>
        <?php $no++; ?>
    <?php endforeach;?>
</body>
</html>