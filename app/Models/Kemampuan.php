<?php

namespace App\Models;

use CodeIgniter\Model;

class Kemampuan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kemampuan';
    protected $primaryKey       = 'id_kemampuan';
    
    protected $allowedFields    = [
        'id_mahasiswa',
        'kategori_kemampuan',
        'sub_kategori_kemampuan',
    ];

}
