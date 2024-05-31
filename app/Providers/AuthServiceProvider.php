<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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

        Gate::define('superadmin-only', function ($user) {
            return $user->role === 'superadmin';
        });

        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('all-access', function ($user) {
            return in_array($user->role, ['superadmin', 'admin']);
        });
    }
}