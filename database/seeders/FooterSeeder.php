<?php

namespace Database\Seeders;

use App\Models\Landing\Footer;
use Illuminate\Database\Seeder;
use App\Models\Landing\HeroModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Footer::create([
            'alamat' => 'Sekretariat Jl. Batam, Blang Pulo, Kec. Muara Satu, Kota Lhokseumawe Provinsi Aceh, Indonesia',
            'telp' => '082242807340',
            'email' => 'ormawa@gmail.com',
            'medsos_links' => 'https://www.instagram.com/ft.unimal/',
            'medsos_icon' => '<i class="bi bi-instagram"></i>',
            'useful_links' => '/',
            'useful_links_title' => 'Home',
        ]);
        Footer::create([
            'medsos_links' => 'https://www.instagram.com/ft.unimal/',
            'medsos_icon' => '<i class="bi bi-globe"></i>',
            'useful_links' => '/#tentangkami',
            'useful_links_title' => 'Tentang Kami',
        ]);
        Footer::create([
            'useful_links' => '/berita',
            'useful_links_title' => 'Berita',
        ]);
    }
}
