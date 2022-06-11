<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
    public function up()
    {
        //
        $this->forge->addField(array(
            'id_anggota' => array(
                    'type' => 'INT',
                    'constraint' => 255,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'kode_anggota' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '45',
            ),
            'nama_anggota' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '45',
            ),
            'jurusan_anggota' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '45',
            ),
            'no_telp_anggota' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '25',
            ),
            'alamat_anggota' => array(
                    'type' => 'TEXT',
            ),
        ));
        $this->forge->addKey('id_anggota', TRUE);
        $this->forge->createTable('anggota');
    }

    public function down()
    {
        //
        $this->forge->dropTable('anggota');
    }
}
