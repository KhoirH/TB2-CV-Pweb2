<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku extends Model
{
    protected $table      = 'buku';
    protected $primaryKey = 'id_buku';
    protected $returnType = "object";

    protected $allowedFields = [
        'kode_buku',
        'judul_buku',
        'penulis_buku',
        'penerbit_buku',
        'tahun_penerbit',
        'id_rak',
        'stok'
    ];

    // Validation
    protected $validationRules = [
        'kode_buku' => "required",
        'judul_buku' => "required",
        'penulis_buku' => "required",
        'penerbit_buku' => "required",
        'tahun_penerbit' => "required",
        'id_rak' => "required",
        'harga_per_hari' => "required",
        'stok' => "required"
    ];

    public function getAll(){
        $builder = $this->db->table('buku');
        $builder->join('Rak', 'buku.id_rak = rak.id_rak');
        $query = $builder->get();

        return $query->getResult();
    }
}