<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTournamentDetails extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tournaments', [
          'cp' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
          ],
          'link' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
          ],
          'champions' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
          ]
          ]);
    }

    public function down()
    {
        //
    }
}
