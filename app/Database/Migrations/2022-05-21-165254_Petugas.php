<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugas extends Migration
{
    public function up()
    {
        //
        
        $this->forge->addField(array(
            'id_petugas' => array(
                    'type' => 'INT',
                    'constraint' => 255,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'nama_petugas' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
            ),
            'jabatan_petugas' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
            ),
            'no_telp_petugas' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
            ),
            'alamat_petugas' => array(
                    'type' => 'TEXT',
            ),
            'username_petugas' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '45',
            ),
            'password_petugas' => array(
                    'type' => 'TEXT',
            ),
        ));
        $this->forge->addKey('id_petugas', TRUE);
        $this->forge->createTable('petugas');
    }

    public function down()
    {
        //
        
        $this->forge->dropTable('petugas');
    }
}
