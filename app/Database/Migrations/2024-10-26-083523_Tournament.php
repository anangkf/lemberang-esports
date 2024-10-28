<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tournament extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'picture' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'registerDates' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'eventDates' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'htm' => [
                'type' => 'INT',
                'null' => true,
                'default' => 0
            ],
            'slot' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'prize' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'rules' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'organizer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id');
        $this->forge->createTable('tournaments');
    }

    public function down()
    {
        $this->forge->dropTable('tournaments');
    }
}
