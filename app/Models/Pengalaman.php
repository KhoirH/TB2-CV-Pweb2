<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengalaman extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengalaman';
    protected $primaryKey       = 'id_pengalaman';
    protected $returnType       = 'array';

    
    protected $allowedFields    = [
        'id_mahasiswa',
        'pengalaman',
    ];
}
