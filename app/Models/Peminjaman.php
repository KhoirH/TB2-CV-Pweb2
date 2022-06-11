<?php

namespace App\Models;

use CodeIgniter\Model;

class Peminjaman extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $returnType = "object";

    protected $allowedFields = [
        'kode_peminjaman',
        'tanggal_pinjam',
        'tanggal_kembali',
        'id_buku',
        'id_anggota',
        'id_petugas'
    ];

    // Validation
    protected $validationRules = [
        'kode_peminjaman' => 'required',
        'tanggal_pinjam' => 'required',
        'tanggal_kembali' => 'required',
        'id_buku' => 'required',
        'id_anggota' => 'required',
        'id_petugas' => 'required'
    ];

    public function geterror(){
        return $this->db->error();
    }
}