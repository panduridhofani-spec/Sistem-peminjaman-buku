<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* ===============================
        ADMIN
        =============================== */
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nama_user' => 'Administrator',
                'password'  => Hash::make('admin123'),
                'no_hp'     => '08123456789',
                'alamat'    => 'Kantor Pusat',
                'role'      => 'admin'
            ]
        );

        /* ===============================
        USER
        =============================== */
        User::firstOrCreate(
            ['email' => 'user1@gmail.com'],
            [
                'nama_user' => 'User Demo 1',
                'password'  => Hash::make('user123'),
                'no_hp'     => '08987654321',
                'alamat'    => 'Alamat User',
                'role'      => 'user'
            ]
        );

        User::firstOrCreate(
            ['email' => 'user2@gmail.com'],
            [
                'nama_user' => 'User Demo 2',
                'password'  => Hash::make('user123'),
                'no_hp'     => '08987654321',
                'alamat'    => 'Alamat User',
                'role'      => 'user'
            ]
        );
    }
}
