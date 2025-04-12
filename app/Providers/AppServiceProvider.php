<?php

namespace App\Providers;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;

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
        //
        $settings = GeneralSetting::first();
        App::instance('settings', $settings);
        Schema::defaultStringLength(191);
    }
}
