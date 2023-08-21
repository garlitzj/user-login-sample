<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class UsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '32',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ip' => [
                'type'       => 'VARCHAR',
                'constraint' => '45',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'job' => [
                'type'       => 'VARCHAR',
                'constraint' => '64',
                'null' => true
            ],
            'about_me' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => new RawSql('NOW()'),
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'default' => new RawSql('NOW()'),
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null' => true,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
