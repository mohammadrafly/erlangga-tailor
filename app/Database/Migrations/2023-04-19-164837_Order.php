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
            'customer' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pesanan' => [
                'type' => 'ENUM("perbaikan","tanpa_desain", "dengan_desain")',
                'default' => 'perbaikan',
                'null' => false,
            ],
            'foto_kain' => [
                'type' => 'VARCHAR',
                'contraint' => '255'
            ],
            'pola_desain' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'kategori' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('orders', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
