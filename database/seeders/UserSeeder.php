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
            'name' => 'DPM FT-UNIMAL',
            'username' => 'dpm-ft-unimal',
            'email' => 'dpm@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'BEM FT-UNIMAL',
            'username' => 'bem-ft-unimal',
            'email' => 'bem@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMATESIN',
            'username' => 'himatesin-ft-unimal',
            'email' => 'himatesin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMATESIP',
            'username' => 'himatesip-ft-unimal',
            'email' => 'himastesip@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMATRO',
            'username' => 'himatro-ft-unimal',
            'email' => 'himatro@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMTI',
            'username' => 'himti-ft-unimal',
            'email' => 'himti@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMATEMIA',
            'username' => 'himatemia-ft-unimal',
            'email' => 'himatemia@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMATIF',
            'username' => 'himatif-ft-unimal',
            'email' => 'himatif@gmail.com',
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
            'name' => 'HMTM FT-UNIMAL',
            'username' => 'hmtm-ft-unimal',
            'email' => 'hmtm@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'HIMATELOGIS',
            'username' => 'himatelogis-ft-unimal',
            'email' => 'himatelogis@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'HIMATEKA',
            'username' => 'himateka-ft-unimal',
            'email' => 'himateka@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}
