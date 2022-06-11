<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengembalian extends Migration
{
    public function up()
    {
        //
        $this->forge->addField(array(
            'id_pengembalian' => array(
                    'type' => 'INT',
                    'constraint' => 255,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'id_pinjam' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
            'tanggal_pengembalian' => array(
                    'type' => 'DATE',
            ),
            'total_pembayaran' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
            'denda' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
            'id_petugas' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
        ));
        $this->forge->addKey('id_pengembalian', TRUE);
        $this->forge->createTable('pengembalian');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pengembalian');
    }
}
