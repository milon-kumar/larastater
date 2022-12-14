<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('role',function ($role){
            return Auth::user()->role->slug == $role;
        });

        View::composer('layouts.backend.includes.sidebar',function ($view){
           $view->with('user',Auth::user());
//           $view->with('mk','this is a message');
        });
    }
}
