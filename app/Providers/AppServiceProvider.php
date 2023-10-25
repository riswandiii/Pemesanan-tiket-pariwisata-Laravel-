<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->admin;
        });

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

    }
}
