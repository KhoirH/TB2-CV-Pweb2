<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'id_mahasiswa';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_hp',
        'email',
        'jenis_kelamin',
        'status',
        'tinggi_badan',
        'berat_badan',
        'alamat',
        'tentang_saya',
    ];
}
