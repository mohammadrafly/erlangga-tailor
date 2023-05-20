<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'pesanan' => [
                'type' => 'ENUM("dengan_desain","tanpa_desain","perbaikan")',
                'default' => 'perbaikan',
                'null' => false,
            ],
            'foto_kain' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pola_desain' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("laki-laki","perempuan")',
                'default' => 'laki-laki',
                'null' => false,
            ],
            'ukuran' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'catatan' => [
                'type' => 'TEXT', 
            ],
            'tanggal_selesai' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => null,
            ],
            'harga' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => null,
            ],
            'kode_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],  
            'status_track' => [
                'type' => "ENUM('new','pending','dibatalkan', 'diterima', 'sudah_sampai', 'diproses', 'sudah_jadi', 'belum_lunas', 'lunas', 'dikirim', 'selesai')",
                'default' => 'new',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATE',
            ],
            'updated_at' => [
                'type' => 'DATE',
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('order', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
