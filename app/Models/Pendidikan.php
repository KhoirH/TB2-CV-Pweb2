<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendidikan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id_pendidikan';
    protected $allowedFields    = [
        'id_mahasiswa',
        'tipe_pendidikan',
        'nama_pendidikan',
        'tempat_pendidikan',
        'waktu_pendidikan',
    ];
}
