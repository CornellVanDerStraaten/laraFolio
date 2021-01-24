<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 7 Projecten met random data genereren
        $faker = Faker\Factory::create('nl_NL');

        $user = new User();

        $user->save();

    }
}
