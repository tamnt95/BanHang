<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // view()->composer('header', 'App\Http\ViewComposers\ProfileComposer');
        View::composer(
            ['header','Page.loai_sanpham','Page.dat_hang'], 'App\Http\ViewComposers\ProfileComposer'
        );
        // View::composer('dashboard', function ($view) {
        //     //
        // });
       
    }
    

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
