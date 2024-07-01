<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\Admin\KategoriBeritaController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(FooterSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(KategoriInstansiSeeder::class);
        // $this->call(KategoriBeritaSeeder::class);
        $this->call(InstansiSeeder::class);
        // $this->call(BeritaSeeder::class);
    }
}
