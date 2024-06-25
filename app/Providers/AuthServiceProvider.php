<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Admin\Berita;
use App\Models\Admin\Lpj;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Izin akses dashboard

        Gate::define('superadmin-only', function ($user) {
            return $user->role === 'superadmin';
        });

        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('all-access', function ($user) {
            return in_array($user->role, ['superadmin', 'admin']);
        });

        // Izin akses berita
        Gate::define('view-berita', function (User $user, Berita $berita) {
            return $user->role === 'superadmin' || $user->id === $berita->user_id;
        });

        Gate::define('view-kategori-berita', function ($user, $kategori) {
            return $user->id === $kategori->user_id;
        });

        Gate::define('view-all-kategori-berita', function ($user) {
            return $user->role === 'superadmin';
        });
    }
}
