<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        //
        Gate::define('is_admin', function(User $user )
            {
                return $user->role == 'admin';

        });
        Gate::define('is_moderator', function(User $user )
        {
            return in_array($user->role, ['admin', 'moderator']);

    });
    }
}
