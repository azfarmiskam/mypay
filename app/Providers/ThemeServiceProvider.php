<?php

namespace App\Providers;

use App\Models\SystemSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share theme colors with all views
        View::composer('*', function ($view) {
            $settings = Cache::remember('system_settings', 3600, function () {
                return SystemSetting::firstOrCreate([]);
            });
            
            // Share settings object
            $view->with('systemSettings', $settings);
            
            // Share individual color variables for easy access
            $view->with('themeColors', [
                'main' => $settings->main_color ?? '#1E3A8A',
                'secondary' => $settings->secondary_color ?? '#3B82F6',
                'third' => $settings->third_color ?? '#60A5FA',
                'title' => $settings->title_color ?? '#1F2937',
                'subtitle' => $settings->subtitle_color ?? '#4B5563',
                'content' => $settings->content_color ?? '#6B7280',
            ]);
        });
    }
}
