<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ThemeSetting;

class ThemeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share theme settings with all views
        View::composer('*', function ($view) {
            $themeSettings = ThemeSetting::getAllByCategory();
            $view->with('themeSettings', $themeSettings);
        });
    }

    public function register()
    {
        // Register theme helper
        $this->app->singleton('theme', function () {
            return new \App\Services\ThemeService();
        });
    }
}