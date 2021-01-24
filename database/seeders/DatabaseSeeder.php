<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create user, email: testmail@mail.com Password: testuser
        $this->call(UserSeeder::class);

        // Generate 5 projects using lorem ipsum and placeholder images
        $this->call(ProjectSeeder::class);


    }
}
