<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        Gate::define('isAdmin', fn (User $user) => $user->id === 3);
        //    Gate::define('isAdmin', fn (User $user) => $user->id ===3 ? return true : false);
        // Model::unguard();
        // Model::shouldBeStrict();
        // Model::automaticallyEagerLoadRelationships();
    }
}
