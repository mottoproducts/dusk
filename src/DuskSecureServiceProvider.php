<?php

namespace Comtree\DuskSecure;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DuskSecureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Removed all routes that might pose security threats in production
    }

    /**
     * Register any package services.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class,
                Console\DuskCommand::class,
                Console\DuskFailsCommand::class,
                Console\MakeCommand::class,
                Console\PageCommand::class,
                Console\ComponentCommand::class,
                Console\ChromeDriverCommand::class,
            ]);
        }
    }
}
