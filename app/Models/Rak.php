<?php

namespace App\Models;

use CodeIgniter\Model;

class Rak extends Model
{
    protected $table      = 'rak';
    protected $primaryKey = 'id_rak';
    protected $returnType = "object";

    protected $allowedFields = [
        'nama_rak',
        'lokasi_rak'
    ];

    // Validation
    protected $validationRules = [
        'nama_rak' => "required",
        'lokasi_rak' => "required"
    ];
}
