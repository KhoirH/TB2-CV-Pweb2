<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Petugas extends Seeder
{
    public function run()
    {
        //
        $encrypter = \Config\Services::encrypter();

        $data = array(
            array(
                'nama_petugas' => "admin",
                'jabatan_petugas' => 'Admin',
                'no_telp_petugas' => '11111',
                'alamat_petugas' => 'jalan admin',
                'username_petugas' => 'admin',
                'password_petugas' => bin2hex($encrypter->encrypt('admin')),
            ),
            array(
                'nama_petugas' => "user",
                'jabatan_petugas' => 'User',
                'no_telp_petugas' => '22222',
                'alamat_petugas' => 'jalan user',
                'username_petugas' => 'user',
                'password_petugas' => bin2hex($encrypter->encrypt('user')),
            ),
        );

        // Using Query Builder
        $this->db->table('petugas')->insertBatch($data);
    }
}
