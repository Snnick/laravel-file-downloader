<?php

namespace Snnick\LaravelFileDownloader;

use Illuminate\Support\ServiceProvider;
use Snnick\LaravelFileDownloader\Contracts\FileDownloaderContract;
use Snnick\LaravelFileDownloader\Services\FileDownloaderService;

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
        $this->app->singleton(FileDownloaderContract::class, FileDownloaderService::class);
        $this->mergeConfigFrom(__DIR__ . '/Config/file-downloader.php', 'file-downloader');
    }
}
