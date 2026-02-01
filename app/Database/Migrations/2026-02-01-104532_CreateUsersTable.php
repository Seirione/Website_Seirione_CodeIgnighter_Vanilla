<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'first_name'  => [
                'type'       => 'VARCHAR', 
                'constraint' => 100 // FIXED: Increased from 11
            ],
            'last_name'   => [
                'type'       => 'VARCHAR', 
                'constraint' => 100 // FIXED: Increased from 11
            ],
            'email'       => [
                'type'       => 'VARCHAR', // FIXED: Changed INT to VARCHAR
                'constraint' => 255, 
                'unique'     => true,
            ],
            'ign_game_id' => [
                'type'       => 'INT', 
                'constraint' => 5, 
                'unsigned'   => true, // FIXED: Added this to match the ID it points to
                'unique'     => true,
              ],
            // --- NEW DATE FIELDS ---
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
         // --- THE FOREIGN KEY PART ---
        // 1. Field in THIS table (post_id)
        // 2. Table it refers to (posts)
        // 3. Field it refers to (id)
        // 4. On Delete (RESTRICT)
        // 5. On Update (RESTRICT)
        // Ensure 'mc_users_tbl' exists before running this migration!
        $this->forge->addForeignKey('ign_game_id', 'mc_users_tbl', 'id', 'RESTRICT', 'RESTRICT');
        
        $this->forge->createTable('website_users_tbl');
    }   

    public function down()
    {
        $this->forge->dropTable('website_users_tbl');
    }
}