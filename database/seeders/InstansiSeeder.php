<?php

namespace Database\Seeders;

use App\Models\Admin\Instansi;
use App\Models\User;
use Illuminate\Database\Seeder;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $instansis = [
            [
                'kategori_instansi_id' => 1,
                'user_id' => $users->where('username', 'dpm-ft-unimal')->first()->id,
                'nama_resmi' => 'DPM FT-UNIMAL',
                'nama_singkatan' => 'DPM',
                'logo' => null,
                'no_telp' => '123456789',
                'instagram' => 'dpm_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat DPM FT-UNIMAL',
            ],
            [
                'kategori_instansi_id' => 1,
                'user_id' => $users->where('username', 'bem-ft-unimal')->first()->id,
                'nama_resmi' => 'BEM FT-UNIMAL',
                'nama_singkatan' => 'BEM',
                'logo' => null,
                'no_telp' => '987654321',
                'instagram' => 'bem_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat BEM FT-UNIMAL',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himatesip-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATESIP',
                'nama_singkatan' => 'HIMATESIP',
                'logo' => null,
                'no_telp' => '6677889900',
                'instagram' => 'himatesip_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATESIP',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himatesin-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATESIN',
                'nama_singkatan' => 'HIMATESIN',
                'logo' => null,
                'no_telp' => '1122334455',
                'instagram' => 'himatesin_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATESIN',
            ],

            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himatro-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATRO',
                'nama_singkatan' => 'HIMATRO',
                'logo' => null,
                'no_telp' => '4433221100',
                'instagram' => 'himatro_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATRO',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himti-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMTI',
                'nama_singkatan' => 'HIMTI',
                'logo' => null,
                'no_telp' => '9988776655',
                'instagram' => 'himti_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMTI',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himatemia-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATEMIA',
                'nama_singkatan' => 'HIMATEMIA',
                'logo' => null,
                'no_telp' => '5566778899',
                'instagram' => 'himatemia_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATEMIA',
            ],

            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himateka-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATEKA',
                'nama_singkatan' => 'HIMATEKA',
                'logo' => null,
                'no_telp' => '1122112233',
                'instagram' => 'himateka_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATEKA',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himatif-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATIF',
                'nama_singkatan' => 'HIMATIF',
                'logo' => null,
                'no_telp' => '1122112233',
                'instagram' => 'himatif_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATIF',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himasi-unimal')->first()->id,
                'nama_resmi' => 'HIMASI UNIMAL',
                'nama_singkatan' => 'HIMASI',
                'logo' => null,
                'no_telp' => '3344556677',
                'instagram' => 'himasi_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMASI UNIMAL',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'hmtm-ft-unimal')->first()->id,
                'nama_resmi' => 'HMTM FT-UNIMAL',
                'nama_singkatan' => 'HMTM',
                'logo' => null,
                'no_telp' => '2233445566',
                'instagram' => 'hmtm_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HMTM FT-UNIMAL',
            ],
            [
                'kategori_instansi_id' => 2,
                'user_id' => $users->where('username', 'himatelogis-ft-unimal')->first()->id,
                'nama_resmi' => 'HIMATELOGIS',
                'nama_singkatan' => 'HIMATELOGIS',
                'logo' => null,
                'no_telp' => '5566778899',
                'instagram' => 'himatelogis_ft_unimal',
                'website_link' => null,
                'sejarah' => 'Sejarah singkat HIMATELOGIS',
            ],
        ];

        // Buat instansi di database
        foreach ($instansis as $instansi) {
            Instansi::create($instansi);
        }
    }
}
