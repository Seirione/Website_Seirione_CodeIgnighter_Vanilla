<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class WebUsers extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $password = password_hash('password123', PASSWORD_DEFAULT);

        // We will loop 200 times to create 200 pairs of users
        for ($i = 0; $i < 200; $i++) {
            
            // ---------------------------------------------------------
            // STEP 1: Create the "Parent" (MC Game Account) first
            // ---------------------------------------------------------
            $mcData = [
                'ign_name'   => $faker->userName . $i, // Unique name
                'password'   => $password,
                'email'      => "mc_{$i}_" . $faker->email,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Insert into the parent table
            $this->db->table('mc_users_tbl')->insert($mcData);
            
            // !!! CRITICAL !!! 
            // Get the ID of the row we just created.
            // We need this ID to fill the 'ign_game_id' column below.
            $newID = $this->db->insertID(); 

            // ---------------------------------------------------------
            // STEP 2: Create the "Child" (Website Profile)
            // ---------------------------------------------------------
            $websiteData = [
                'first_name'  => $faker->firstName,
                'last_name'   => $faker->lastName,
                'email'       => "web_{$i}_" . $faker->email,
                
                // This connects the two tables!
                'ign_game_id' => $newID, 
                
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];

            // Insert into the table from your migration
            $this->db->table('website_users_tbl')->insert($websiteData);
        }
    }
}