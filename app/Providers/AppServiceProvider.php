<?php

namespace App\Providers;

use App\Models\Admin\Lpj;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposer\LpjComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposer\ProposalComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mengikat view composer ke semua view
        View::composer('*', ProposalComposer::class);
        View::composer('*', LpjComposer::class);
    }
}
