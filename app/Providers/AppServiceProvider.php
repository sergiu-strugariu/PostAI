<?php

namespace App\Providers;

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
        Gate::define('create-team', function ($user): bool {return !User::teamSubsciptionTresholdReached();}); // Checks user subsciption for restrictions
    
    }

    /**
     * Bootstrap any application services. 
     */
    public function boot(): void
    {
        //
    }
}
