<?php

namespace App\Providers;
use App\Models\GeneralSetting;
use App\Models\Menu;
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
        $menus = Menu::whereNull('parent_id')->with('childrenRecursive')->orderBy('created_at')->get();
        App::instance('settings', $settings);
        App::instance('menus', $menus);
        Schema::defaultStringLength(191);
    }
}
