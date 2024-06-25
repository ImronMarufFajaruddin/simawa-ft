<?php

namespace Database\Seeders;

use App\Models\Landing\HeroModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroModel::create([
            'title' => 'simawa ft-unimal',
            'hero_deskripsi' => 'Selamat datang di Sistem Informasi Organisasi Kemahasiswaan Fakultas Teknik Universitas Malikussaleh. Selamat dan semangat untuk mengenal lebih dalam dengan ORMAWA FT-UNIMAL',
            'logo' => null,
            'about_title' => 'Ormawa ft-unimal',
            'about' => 'ORMAWA FT-UNIMAL TERDIRI DARI ',
            'about_foto' => null,

        ]);
    }
}
