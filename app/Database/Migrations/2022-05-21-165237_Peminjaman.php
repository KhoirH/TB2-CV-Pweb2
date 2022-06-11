<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        //
        
        $this->forge->addField(array(
            'id_peminjaman' => array(
                    'type' => 'INT',
                    'constraint' => 255,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'kode_peminjaman' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
            ),
            'tanggal_pinjam' => array(
                    'type' => 'DATE',
            ),
            'tanggal_kembali' => array(
                    'type' => 'DATE',
            ),
            'id_buku' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
            'id_anggota' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
            'id_petugas' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
        ));
        $this->forge->addKey('id_peminjaman', TRUE);
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        //
        $this->forge->dropTable('peminjaman');
    }
}
