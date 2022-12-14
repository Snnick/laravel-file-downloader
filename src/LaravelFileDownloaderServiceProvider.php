<?php

namespace Snnick\LaravelFileDownloader;

use Illuminate\Support\ServiceProvider;

class LaravelFileDownloaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole() && function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/Config/file-downloader.php' => config_path('file-downloader.php'),
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/file-downloader.php', 'file-downloader');
    }
}
