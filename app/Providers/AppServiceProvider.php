<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{Blade, Auth};
use App\Models\User;

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
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'admin';
        }); 
        
        Blade::if('superadmin', function () {
            return auth()->check() && auth()->user()->role === 'superadmin';
        });

        

       Blade::if('user', function () {
            return auth()->check() && auth()->user()->role === 'user';
        });

        // $users = User::where('id', Auth::user()->id)->first();
        // dd($users);
    }
}
