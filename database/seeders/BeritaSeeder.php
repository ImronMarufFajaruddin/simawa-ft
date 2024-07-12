<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $userId = $users->where('username', 'dpm-ft-unimal')->first()->id;

        $beritaData = [
            [
                'user_id' => $userId,
                'kategori_berita_id' => 1, // Pastikan id ini sesuai dengan kategori yang ada
                'judul' => 'Berita Pertama',
                'slug' => Str::slug('Berita Pertama'),
                'konten' => 'Ini adalah konten berita pertama.',
                'gambar' => 'gambar1.jpg',
                'dokumen' => 'dokumen1.pdf',
                'status' => 'Publish',
                'tanggal_publish' => '2024-06-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'kategori_berita_id' => 2, // Pastikan id ini sesuai dengan kategori yang ada
                'judul' => 'Berita Kedua',
                'slug' => Str::slug('Berita Kedua'),
                'konten' => 'Ini adalah konten berita kedua.',
                'gambar' => 'gambar2.jpg',
                'dokumen' => 'dokumen2.pdf',
                'status' => 'Draft',
                'tanggal_publish' => '2024-06-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'kategori_berita_id' => 3, // Pastikan id ini sesuai dengan kategori yang ada
                'judul' => 'Berita Ketiga',
                'slug' => Str::slug('Berita Ketiga'),
                'konten' => 'Ini adalah konten berita ketiga.',
                'gambar' => 'gambar3.jpg',
                'dokumen' => 'dokumen3.pdf',
                'status' => 'Publish',
                'tanggal_publish' => '2024-06-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('berita')->insert($beritaData);
    }
}
