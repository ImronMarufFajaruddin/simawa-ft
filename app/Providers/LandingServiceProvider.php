<?php

namespace App\Providers;

use App\Models\Admin\Instansi;
use Illuminate\Support\Facades\View;
use App\Models\Admin\KategoriInstansi;
use Illuminate\Support\ServiceProvider;

class LandingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //  Menggunakan view composer untuk memuat data ke semua views
        View::composer('*', function ($view) {
            $dataInstansi = Instansi::with('kategoriInstansi')->get();
            $dataKategoriInstansi = KategoriInstansi::all();
            $view->with('dataKategoriInstansi', $dataKategoriInstansi, 'dataInstansi', $dataInstansi);
        });
    }
}
