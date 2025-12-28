<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'nama_user' => $faker->name(),
                'email'     => $faker->unique()->safeEmail(),
                'password'  => Hash::make('password'), // password default
                'no_hp'     => $faker->phoneNumber(),
                'alamat'    => $faker->address(),
            ]);
        }
    }
}
