<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Collection extends Migration
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
            'kategori' => [
                'type' => 'ENUM("perbaikan", "clothing")',
                'default' => 'clothing',
                'null' => false,
            ],
            'product' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'estimasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'img' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('collections', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('collections');
    }
}
