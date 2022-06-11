<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class CurriculumVitae extends BaseController
{
    public $data_diri_model;
    public $kemampuan;
    public $pengalaman;
    public $pendidikan;
    public $db;
    
    public function __construct(){
        $this->data_diri_model = new \App\Models\Mahasiswa();
        $this->kemampuan = new \App\Models\Kemampuan();
        $this->pengalaman = new \App\Models\Pengalaman();
        $this->pendidikan = new \App\Models\Pendidikan();
        $this->db = db_connect();

    }

    public function index()
    {
        $all_mahasiswa = $this->db->query("SELECT mahasiswa.id_mahasiswa, tentang_saya, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, alamat, no_hp, status, email, phase_1.id_pendidikan, phase_1.tipe_pendidikan, phase_1.tempat_pendidikan, phase_1.waktu_pendidikan, phase_1.nama_pendidikan, GROUP_CONCAT(phase_1.id_pengalaman SEPARATOR '[,]') as id_pengalaman, GROUP_CONCAT(phase_1.pengalaman SEPARATOR '[,]') as pengalaman, phase_1.id_kemampuan, phase_1.kategori_kemampuan, phase_1.sub_kategori_kemampuan from mahasiswa left join ( select id_pengalaman, pengalaman.pengalaman, pengalaman.id_mahasiswa, phase_2.kategori_kemampuan, phase_2.sub_kategori_kemampuan, phase_2.id_kemampuan, GROUP_CONCAT(phase_2.tipe_pendidikan SEPARATOR '[,]') as tipe_pendidikan, GROUP_CONCAT(phase_2.id_pendidikan SEPARATOR '[,]') as id_pendidikan, GROUP_CONCAT(phase_2.waktu_pendidikan SEPARATOR '[,]') as waktu_pendidikan, GROUP_CONCAT(phase_2.tempat_pendidikan SEPARATOR '[,]') as tempat_pendidikan, GROUP_CONCAT(phase_2.nama_pendidikan SEPARATOR '[,]') as nama_pendidikan from pengalaman LEFT join ( select id_pendidikan, pendidikan.id_mahasiswa as id_mahasiswa, pendidikan.tipe_pendidikan, pendidikan.nama_pendidikan, pendidikan.waktu_pendidikan, pendidikan.tempat_pendidikan, GROUP_CONCAT(kemampuan.kategori_kemampuan SEPARATOR '[,]' ) as kategori_kemampuan, GROUP_CONCAT( kemampuan.sub_kategori_kemampuan SEPARATOR '[,]' ) as sub_kategori_kemampuan, GROUP_CONCAT(kemampuan.id_kemampuan SEPARATOR '[,]') as id_kemampuan from pendidikan left JOIN kemampuan on pendidikan.id_mahasiswa = kemampuan.id_mahasiswa GROUP BY id_pendidikan ) as phase_2 on pengalaman.id_mahasiswa = phase_2.id_mahasiswa GROUP BY id_pengalaman ) as phase_1 on mahasiswa.id_mahasiswa = phase_1.id_mahasiswa GROUP BY id_mahasiswa")->getResult();
        $data = [
            'all_mahasiswa' => $all_mahasiswa,
        ];
        return view('CurriculumVitaeView', $data);
    }
    public function saveCV(){
        $data = $this->request->getVar();
        $data_diri = [
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'agama' => $data['agama'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'status' => $data['status'],
            'alamat' => $data['alamat'],
            'tentang_saya' => $data['tentang_saya']
        ];
        if($data['type_form'] == 'insert') {
            $insert = $this->data_diri_model->insert($data);
            if($insert) {
                $id_mahasiswa = $this->data_diri_model->insertID;
                $pendidikan = [];
                $kemampuan = [];
                $pengalaman = [];
                $max_index = max( count($data['nama_pendidikan']),  count($data['pengalaman']), count($data['kategori_kemampuan']));
                for($i = 0; $i < $max_index; $i++){
                    if($data['nama_pendidikan'][$i]) {
                        $pendidikan[] = array(
                            'id_mahasiswa' => $id_mahasiswa,
                            'tipe_pendidikan' => $data['tipe_pendidikan'][$i],
                            'nama_pendidikan' => $data['nama_pendidikan'][$i],
                            'tempat_pendidikan' => $data['tempat_pendidikan'][$i],
                            'waktu_pendidikan' => $data['waktu_pendidikan'][$i],
                        );
                    }
                    if($data['pengalaman'][$i]){

                        $pengalaman[] = array(
                            'id_mahasiswa' => $id_mahasiswa,
                            'pengalaman' => $data['pengalaman'][$i],
                        );
                    }
                    if($data['kategori_kemampuan'][$i]){

                        $kemampuan[] = array(
                            'id_mahasiswa' => $id_mahasiswa,
                            'kategori_kemampuan' => $data['kategori_kemampuan'][$i],
                            'sub_kategori_kemampuan' => $data['sub_kategori_kemampuan'][$i],
                        );
                    }
                }
                $insert_pengalaman = $this->pengalaman->insertBatch($pengalaman);
                $insert_kemampuan = $this->kemampuan->insertBatch($kemampuan);
                $insert_pendidikan = $this->pendidikan->insertBatch($pendidikan);
            }
        }
        if($data['type_form'] == 'edit') {
            $id_mahasiswa = $data['id_mahasiswa'];
            $update = $this->data_diri_model->update($id_mahasiswa,$data);
            if($update) {
                $id_pengalaman = $data['id_pengalaman'];
                $id_kemampuan = $data['id_kemampuan'];
                $id_pendidikan = $data['id_pendidikan'];
                
                $pendidikan = [];
                $kemampuan = [];
                $pengalaman = [];
                
                $max_index = max( count($data['nama_pendidikan']),  count($data['pengalaman']), count($data['kategori_kemampuan']));

                for($i = 0; $i < $max_index; $i++){
                    if($data['nama_pendidikan'][$i]) {
                        if($id_pendidikan[$i]) { 
                            $this->pendidikan->update($id_pendidikan[$i], array(
                                'id_mahasiswa' => $id_mahasiswa,
                                'tipe_pendidikan' => $data['tipe_pendidikan'][$i],
                                'nama_pendidikan' => $data['nama_pendidikan'][$i],
                                'tempat_pendidikan' => $data['tempat_pendidikan'][$i],
                                'waktu_pendidikan' => $data['waktu_pendidikan'][$i],
                            ));
                        } else {
                            $pendidikan[] = array(
                                'id_mahasiswa' => $id_mahasiswa,
                                'tipe_pendidikan' => $data['tipe_pendidikan'][$i],
                                'nama_pendidikan' => $data['nama_pendidikan'][$i],
                                'tempat_pendidikan' => $data['tempat_pendidikan'][$i],
                                'waktu_pendidikan' => $data['waktu_pendidikan'][$i],
                            );
                        }
                    }
                    if($data['pengalaman'][$i]){
                        if($id_pengalaman[$i]) { 
                            $this->pengalaman->update($id_pengalaman[$i], array(
                                'id_mahasiswa' => $id_mahasiswa,
                                'pengalaman' => $data['pengalaman'][$i],
                            ));
                        } else {
                            $pengalaman[] = array(
                                'id_mahasiswa' => $id_mahasiswa,
                                'pengalaman' => $data['pengalaman'][$i],
                            );
                        }
                    }
                    if($data['kategori_kemampuan'][$i]){

                        if($id_kemampuan[$i]) { 
                            $this->kemampuan->update($id_kemampuan[$i], array(
                                'id_mahasiswa' => $id_mahasiswa,
                                'kategori_kemampuan' => $data['kategori_kemampuan'][$i],
                                'sub_kategori_kemampuan' => $data['sub_kategori_kemampuan'][$i],
                            ));
                        } else {
                            $kemampuan[] = array(
                                'id_mahasiswa' => $id_mahasiswa,
                                'kategori_kemampuan' => $data['kategori_kemampuan'][$i],
                                'sub_kategori_kemampuan' => $data['sub_kategori_kemampuan'][$i],
                            );
                        }
                    }
                }
                
                $insert_pengalaman = $this->pengalaman->insertBatch($pengalaman);
                $insert_kemampuan = $this->kemampuan->insertBatch($kemampuan);
                $insert_pendidikan = $this->pendidikan->insertBatch($pendidikan);
            }
            // return 'edit';
        }


        return redirect()->back();
    }
    public function delete($id){
        $delete = $this->data_diri_model->delete(['id_mahasiswa' => $id]);
        $delete_kemampuan = $this->kemampuan->delete(['id_mahasiswa' => $id]);
        $delete_pengalaman = $this->pengalaman->delete(['id_mahasiswa' => $id]);
        $delete_pendidikan = $this->pendidikan->delete(['id_mahasiswa' => $id]);
        return redirect()->back();
    }
    public function exportExcel(){
        $all_mahasiswa = $this->db->query("SELECT mahasiswa.id_mahasiswa, tentang_saya, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, alamat, no_hp, status, email, phase_1.id_pendidikan, phase_1.tipe_pendidikan, phase_1.tempat_pendidikan, phase_1.waktu_pendidikan, phase_1.nama_pendidikan, GROUP_CONCAT(phase_1.id_pengalaman SEPARATOR '[,]') as id_pengalaman, GROUP_CONCAT(phase_1.pengalaman SEPARATOR '[,]') as pengalaman, phase_1.id_kemampuan, phase_1.kategori_kemampuan, phase_1.sub_kategori_kemampuan from mahasiswa left join ( select id_pengalaman, pengalaman.pengalaman, pengalaman.id_mahasiswa, phase_2.kategori_kemampuan, phase_2.sub_kategori_kemampuan, phase_2.id_kemampuan, GROUP_CONCAT(phase_2.tipe_pendidikan SEPARATOR '[,]') as tipe_pendidikan, GROUP_CONCAT(phase_2.id_pendidikan SEPARATOR '[,]') as id_pendidikan, GROUP_CONCAT(phase_2.waktu_pendidikan SEPARATOR '[,]') as waktu_pendidikan, GROUP_CONCAT(phase_2.tempat_pendidikan SEPARATOR '[,]') as tempat_pendidikan, GROUP_CONCAT(phase_2.nama_pendidikan SEPARATOR '[,]') as nama_pendidikan from pengalaman LEFT join ( select id_pendidikan, pendidikan.id_mahasiswa as id_mahasiswa, pendidikan.tipe_pendidikan, pendidikan.nama_pendidikan, pendidikan.waktu_pendidikan, pendidikan.tempat_pendidikan, GROUP_CONCAT(kemampuan.kategori_kemampuan SEPARATOR '[,]' ) as kategori_kemampuan, GROUP_CONCAT( kemampuan.sub_kategori_kemampuan SEPARATOR '[,]' ) as sub_kategori_kemampuan, GROUP_CONCAT(kemampuan.id_kemampuan SEPARATOR '[,]') as id_kemampuan from pendidikan left JOIN kemampuan on pendidikan.id_mahasiswa = kemampuan.id_mahasiswa GROUP BY id_pendidikan ) as phase_2 on pengalaman.id_mahasiswa = phase_2.id_mahasiswa GROUP BY id_pengalaman ) as phase_1 on mahasiswa.id_mahasiswa = phase_1.id_mahasiswa GROUP BY id_mahasiswa")->getResult();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Nama')
                    ->setCellValue('C1', 'Tempat, tanggal lahir')
                    ->setCellValue('D1', 'Agama')
                    ->setCellValue('E1', 'Jenis Kelamin')
                    ->setCellValue('F1', 'Status')
                    ->setCellValue('G1', 'Email')
                    ->setCellValue('H1', 'No Handphone')
                    ->setCellValue('I1', 'Pendidikan')
                    ->setCellValue('J1', 'Pengalaman')
                    ->setCellValue('K1', 'Kemampuan')
                    ->setCellValue('L1', 'Tentang Saya');
        
        $column = 2;
        // tulis data mobil ke cell
        
        foreach($all_mahasiswa as $mahasiswa) {
            $pengalamanHTML = "";
            $pendidikanHTML = "";
            $kemampuanHTML = "";
            $tipe_pendidikan_array = explode("[,]", $mahasiswa->tipe_pendidikan);
            $tempat_pendidikan_array = explode("[,]", $mahasiswa->tempat_pendidikan);
            $waktu_pendidikan_array = explode("[,]", $mahasiswa->waktu_pendidikan);
            $nama_pendidikan_array = explode("[,]", $mahasiswa->nama_pendidikan);
            $pengalaman_array = explode("[,]", $mahasiswa->pengalaman);
            $kategori_kemampuan_array = explode("[,]", $mahasiswa->kategori_kemampuan);
            $sub_kategori_kemampuan_array = explode("[,]", $mahasiswa->sub_kategori_kemampuan);

            $max_index = max( count($tipe_pendidikan_array ),  count($pengalaman_array), count($kategori_kemampuan_array));

            for($i = 0; $i < $max_index; $i++) {
                if($tipe_pendidikan_array[$i]) {
                    $pendidikanHTML .= "-> ".$tipe_pendidikan_array[$i]."-".$nama_pendidikan_array[$i]."-".$tempat_pendidikan_array[$i]."-".$waktu_pendidikan_array[$i]."\n";
                }
                if($pengalaman_array[$i]){
                    $pengalamanHTML .= "-> ".$pengalaman_array[$i]."\n";
                }
                if($kategori_kemampuan_array[$i]){
                    $kemampuanHTML .= "-> ".$kategori_kemampuan_array[$i]."-".$sub_kategori_kemampuan_array[$i]."\n";
                }
            }
            $pendidikanHTML .= "";
            $pengalamanHTML .= "";
            $kemampuanHTML .= "";

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $column - 1)
                        ->setCellValue('B' . $column, $mahasiswa->nama)
                        ->setCellValue('C' . $column, $mahasiswa->tempat_lahir . ", " . $mahasiswa->tanggal_lahir )
                        ->setCellValue('D' . $column, $mahasiswa->agama)
                        ->setCellValue('E' . $column, $mahasiswa->jenis_kelamin)
                        ->setCellValue('F' . $column, $mahasiswa->status)
                        ->setCellValue('G' . $column, $mahasiswa->email)
                        ->setCellValue('H' . $column, $mahasiswa->no_hp)
                        ->setCellValue('I' . $column, $pendidikanHTML)
                        ->setCellValue('J' . $column, $pengalamanHTML)
                        ->setCellValue('K' . $column, $kemampuanHTML)
                        ->setCellValue('L' . $column, $mahasiswa->tentang_saya);
            
            $spreadsheet->getActiveSheet()->getStyle('I'.$column)->getAlignment()->setWrapText(true);
            $spreadsheet->getActiveSheet()->getStyle('J'.$column)->getAlignment()->setWrapText(true);
            $spreadsheet->getActiveSheet()->getStyle('K'.$column)->getAlignment()->setWrapText(true);
            $column++;
        }

        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(40);

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Mahasiswa';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        return $writer->save('php://output');
    }
    function exportPDF() {
        $all_mahasiswa = $this->db->query("SELECT mahasiswa.id_mahasiswa, tentang_saya, nama, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, alamat, no_hp, status, email, phase_1.id_pendidikan, phase_1.tipe_pendidikan, phase_1.tempat_pendidikan, phase_1.waktu_pendidikan, phase_1.nama_pendidikan, GROUP_CONCAT(phase_1.id_pengalaman SEPARATOR '[,]') as id_pengalaman, GROUP_CONCAT(phase_1.pengalaman SEPARATOR '[,]') as pengalaman, phase_1.id_kemampuan, phase_1.kategori_kemampuan, phase_1.sub_kategori_kemampuan from mahasiswa left join ( select id_pengalaman, pengalaman.pengalaman, pengalaman.id_mahasiswa, phase_2.kategori_kemampuan, phase_2.sub_kategori_kemampuan, phase_2.id_kemampuan, GROUP_CONCAT(phase_2.tipe_pendidikan SEPARATOR '[,]') as tipe_pendidikan, GROUP_CONCAT(phase_2.id_pendidikan SEPARATOR '[,]') as id_pendidikan, GROUP_CONCAT(phase_2.waktu_pendidikan SEPARATOR '[,]') as waktu_pendidikan, GROUP_CONCAT(phase_2.tempat_pendidikan SEPARATOR '[,]') as tempat_pendidikan, GROUP_CONCAT(phase_2.nama_pendidikan SEPARATOR '[,]') as nama_pendidikan from pengalaman LEFT join ( select id_pendidikan, pendidikan.id_mahasiswa as id_mahasiswa, pendidikan.tipe_pendidikan, pendidikan.nama_pendidikan, pendidikan.waktu_pendidikan, pendidikan.tempat_pendidikan, GROUP_CONCAT(kemampuan.kategori_kemampuan SEPARATOR '[,]' ) as kategori_kemampuan, GROUP_CONCAT( kemampuan.sub_kategori_kemampuan SEPARATOR '[,]' ) as sub_kategori_kemampuan, GROUP_CONCAT(kemampuan.id_kemampuan SEPARATOR '[,]') as id_kemampuan from pendidikan left JOIN kemampuan on pendidikan.id_mahasiswa = kemampuan.id_mahasiswa GROUP BY id_pendidikan ) as phase_2 on pengalaman.id_mahasiswa = phase_2.id_mahasiswa GROUP BY id_pengalaman ) as phase_1 on mahasiswa.id_mahasiswa = phase_1.id_mahasiswa GROUP BY id_mahasiswa")->getResult();
        $data = [
            'all_mahasiswa' => $all_mahasiswa,
        ];
        $filename = "Data Mahasiswa";

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('PdfListView', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        return $dompdf->stream($filename);
    }
    function exportPDFCV($id) {
        
        $data_mahasiswa = $this->data_diri_model->where('id_mahasiswa', $id)->first();
        $kemampuan = $this->kemampuan->where('id_mahasiswa', $id)->findAll();
        $pengalaman = $this->pengalaman->where('id_mahasiswa', $id)->findAll();
        $pendidikan_formal =  $this->db->query("SELECT * from pendidikan where id_mahasiswa=$id and tipe_pendidikan ='formal'")->getResult();
        $pendidikan_non_formal = $this->db->query("SELECT * from pendidikan where id_mahasiswa=$id and tipe_pendidikan ='non-formal'")->getResult();
        $filename = "CV " . $data_mahasiswa['nama'];
        $data = [
            'mahasiswa' => $data_mahasiswa,
            'kemampuan' => $kemampuan,
            'pengalaman' => $pengalaman,
            'pendidikan_formal' => $pendidikan_formal,
            'pendidikan_non_formal' => $pendidikan_non_formal,
        ];
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $view = view('MahasiswaCVView', $data);
        // load HTML content
        $dompdf->loadHtml($view);

        // (optional) setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();
        // var_dump($data_mahasiswa);
        // output the generated pdf
        return $dompdf->stream($filename);
    }
}
