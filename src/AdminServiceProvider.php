<?php

namespace Resto2web\Admin;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Resto2web\Admin\App\Admin\Middleware\AdminMiddleware;
use Resto2web\Admin\App\Admin\Middleware\AdminSeoMiddleware;
use Resto2web\Admin\Console\Commands\PublishAdminAssets;
use Yoeunes\Notify\NotifyServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('admin', AdminMiddleware::class);
        $router->aliasMiddleware('admin-seo', AdminSeoMiddleware::class);
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'admin');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'resto2web-admin');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/core.php' => config_path('admin.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/admin'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../publishable/assets' => public_path('vendor/admin'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/admin'),
            ], 'lang');*/

            // Registering package commands.
             $this->commands([
                 PublishAdminAssets::class
             ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
//        $this->mergeConfigFrom(__DIR__.'/../config/core.php', 'admin');

        // Register the main class to use with the facade
        $this->app->singleton('admin', function () {
            return new Admin;
        });

        $this->app->singleton('Resto2WebGuard', function () {
            return config('auth.defaults.guard', 'web');
        });
    }
}
