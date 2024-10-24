<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
    public function up()
    {
        $this->forge->addField([
          'id' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
          ],
          'userId' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
          ],
          'beritaId' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
          ],
          'text' => [
            'type' => 'TEXT',
            'null' => false,
          ],
          'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
            'default' => null,
          ],
          'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
            'default' => null,
          ],
          'deleted_at' => [
            'type' => 'DATETIME',
            'null' => true,
            'default' => null,
          ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('userId', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('beritaId', 'berita', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
