<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Admin\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $userId = $users->where('username', 'dpm-ft-unimal')->first()->id;

        KategoriBerita::create([
            'user_id' => $userId,
            'slug' => 'kategori-berita-1',
            'kategori_nama' => 'Kategori Berita 1'
        ]);
        KategoriBerita::create([
            'user_id' => $userId,
            'slug' => 'kategori-berita-2',
            'kategori_nama' => 'Kategori Berita 2'
        ]);
    }
}
