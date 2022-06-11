<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggota extends Model
{
    protected $table      = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $returnType = "object";

    protected $allowedFields = [
        'kode_anggota',
        'nama_anggota',
        'jurusan_anggota',
        'no_telp_anggota',
        'alamat_anggota',
    ];

    // Validation
    protected $validationRules = [
        'kode_anggota' => 'required',
        'nama_anggota' => 'required',
        'jurusan_anggota' => 'required',
        'no_telp_anggota' => 'required',
        'alamat_anggota' => 'required',
    ];

    public function getAll(){
        $builder = $this->db->table('anggota');
        $query = $builder->get();
        return $query->getResult();
    }
}