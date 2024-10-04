<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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
        // set default eager loading (solve N + 1)
        Model::preventLazyLoading();

        // jika ingin pagination dengan css yang berbeda dengan tailwind
        // Paginator::useBootstrapFive();
    }
}
