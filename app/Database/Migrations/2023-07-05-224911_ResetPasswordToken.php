<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ResetPasswordToken extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'exp' => [
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
        $this->forge->createTable('reset_password_token', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('reset_password_token');
    }
}
