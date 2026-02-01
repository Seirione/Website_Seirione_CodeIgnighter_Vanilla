<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MCTable extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT', 
                'constraint'     => 5, 
                'unsigned'       => true, // This is Unsigned
                'auto_increment' => true
            ],
            'ign_name'  => [
                'type'       => 'VARCHAR', 
                'constraint' => 100 // FIXED: Increased from 11
            ],
            'password'   => [
                'type'       => 'VARCHAR', 
                'constraint' => 100 // FIXED: Increased from 11
            ],
            'email'       => [
                'type'       => 'VARCHAR', // FIXED: Changed INT to VARCHAR
                'constraint' => 255, 
                'unique'     => true,
            ],
              'created_at' => [
                'type' => 'DATETIME',
                'null' => true, 
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
   
        
        $this->forge->createTable('mc_users_tbl');
    }

  public function down()
    {
        // Must add this so "migrate:refresh" works correctly!
        $this->forge->dropTable('mc_users_tbl');
    }
}
