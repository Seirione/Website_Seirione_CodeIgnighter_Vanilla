<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory; // Import Faker to generate names

class MainSeeder extends Seeder
{
    public function run()
    {
        // 1. Initialize Faker
        $faker = Factory::create();

        // 2. Hash password ONCE (for speed)
        // We use the same password 'password123' for everyone so you can login easily
        $password = password_hash('password123', PASSWORD_DEFAULT);

        // 3. Loop 200 times
        for ($i = 0; $i < 200; $i++) {
            
            // --- A. Create the Game Account ---
            $gameData = [
                // $faker->userName gives random stuff like 'CoolGuy99'
                'ign_name'   => $faker->userName . $i, // Added $i to ensure it is 100% unique
                'password'   => $password,
                'email'      => "mc_{$i}_" . $faker->email, // Ensure unique email
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('mc_users_tbl')->insert($gameData);
            $newGameID = $this->db->insertID(); // Grab the new ID

            // --- B. Create the Website Profile ---
            $userData = [
                'first_name'  => $faker->firstName,
                'last_name'   => $faker->lastName,
                // Ensure this email is unique too
                'email'       => "web_{$i}_" . $faker->email, 
                'ign_game_id' => $newGameID, // <--- LINK THEM
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];

            $this->db->table('website_users_tbl')->insert($userData);
        }
    }
}