<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        //
        
        $this->forge->addField(array(
            'id_buku' => array(
                    'type' => 'INT',
                    'constraint' => 255,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'id_rak' => array(
                    'type' => 'INT',
                    'constraint' => 255,
            ),
            'kode_buku' => array(
                    'type' => 'CHAR',
                    'constraint' => '5',
            ),
            'judul_buku' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
            ),
            'penulis_buku' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '45',
            ),
            'penerbit_buku' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '45',
            ),
            'tahun_penerbit' => array(
                    'type' => 'YEAR',
                    'constraint' => '4',
            ),
            'harga_per_hari' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
            'stok' => array(
                    'type' => 'INT',
                    'constraint' => '11',
            ),
        ));
        $this->forge->addKey('id_buku', TRUE);
        $this->forge->createTable('buku');
    }

    public function down()
    {
        //
        $this->forge->dropTable('buku');
    }
}
