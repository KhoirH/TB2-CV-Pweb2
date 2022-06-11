<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $returnType = "object";

    protected $allowedFields = [
        'nama_petugas',
        'jabatan_petugas',
        'no_telp_petugas',
        'alamat_petugas',
        'username_petugas',
        'password_petugas'
    ];

    // Validation
    protected $validationRules = [
        'nama_petugas' => "required",
        'jabatan_petugas' => "required",
        'alamat_petugas' => "required",
        'username_petugas' => "required",
        'password_petugas' => "required"
    ];

    public function getAll(){
        $builder = $this->db->table('petugas');
        $query = $builder->get();

        return $query->getResult();
    }
}