<?php

namespace Nanissa\Authentication;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $migrationSource = __DIR__.'/database/migrations';
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom($migrationSource);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $configPath = __DIR__ . '/config/config.php';
        $this->publishes([
            $configPath => config_path('authentication.php'),
        ], 'config');
        $this->mergeConfigFrom(
            $configPath, 'authentication'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/nanissa/authentication');

        $sourcePath =  __DIR__.'/resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/nanissa/authentication';
        }, \Config::get('view.paths')), [$sourcePath]), 'authentication');
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
