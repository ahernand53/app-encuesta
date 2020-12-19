<?php

namespace App\Providers;

use App\Admin;
use App\Mail\AdminRegister;
use App\Mail\UserRegister;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // User::created(function ($user) {
        //     Mail::to($user)->send(
        //         new UserRegister($user)
        //     );
        // });

        // Admin::created(function ($admin) {
        //     Mail::to($admin)->send(
        //         new AdminRegister($admin)
        //     );
        // });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
