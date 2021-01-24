<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user->firstname    = $faker->name;
        $user->email        = 'testmail@mail.com';
        $user->phone        = $faker->phoneNumber;
        $user->password     = Hash::make('testuser');
        $user->role_id      = 1;
        $user->active       = 1;
        $user->save();

    }
}
