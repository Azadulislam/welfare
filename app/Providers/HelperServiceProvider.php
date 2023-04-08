<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $alHelperFiles = glob(app_path('Helpers'). '/*.php');
        foreach ($alHelperFiles as $key => $helperFile){
            include_once  $helperFile;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
