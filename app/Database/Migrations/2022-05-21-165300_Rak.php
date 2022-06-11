<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rak extends Migration
{
    public function up()
    {
        //
        $this->forge->addField(array(
            'id_rak' => array(
                    'type' => 'INT',
                    'constraint' => 255,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'nama_rak' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
            ),
            'lokasi_rak' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
            ),
        ));
        $this->forge->addKey('id_rak', TRUE);
        $this->forge->createTable('rak');
    }

    public function down()
    {
        //
        $this->forge->dropTable('rak');
    }
}
