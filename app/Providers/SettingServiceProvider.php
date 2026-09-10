<?php

namespace App\Providers;

use App\Services\SettingsService;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SettingsService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settings = $this->app->make(SettingsService::class);
        $settings->setSettings();
    }
}
