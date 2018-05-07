<?php

namespace App\Providers;

use App\Repo\Test;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->regTest();
    }

    public function regTest()
    {
        $this->app->singleton('fatest', function () {
            return new Test();
        });

    }
}
