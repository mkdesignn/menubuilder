<?php

namespace Mkdesignn\MenuBuilder;

use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . "/../config/menu.php" => config_path()."/menu.php"
        ], "config");

        $this->publishes([
            __DIR__ . "/../style/style.css" => public_path()."/menu/style.css",
            __DIR__ . "/../js/menu.js" => public_path()."/menu/index.js",
        ], "public");



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Menu', function($app){
            $menu = $this->app->make('Mkdesignn\MenuBuilder\FactoryMenu');
            $menu->setConfig($this->app['config']["menu"]);
            return $menu;
        });

    }
}
