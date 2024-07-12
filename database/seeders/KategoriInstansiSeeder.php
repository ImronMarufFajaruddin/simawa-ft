<?php

namespace Database\Seeders;

use App\Models\Admin\KategoriInstansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriInstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriInstansi::create([
            'kategori_nama' => 'Fakultas'
        ]);
        KategoriInstansi::create([
            'kategori_nama' => 'HMP'
        ]);
    }
}
