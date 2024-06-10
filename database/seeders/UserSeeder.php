<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Administrator',
            'username' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'role' => 'superadmin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMASI UNIMAL',
            'username' => 'himasi-unimal',
            'email' => 'himasi@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'DPM FT-UNIMAL',
            'username' => 'dpm-ft-unimal',
            'email' => 'dpm@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}
