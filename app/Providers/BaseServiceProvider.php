<?php

namespace App\Providers;

use App\Supports\Helper;
use App\Traits\LoadAndPublishDataTraits;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTraits;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Helper::autoload(__DIR__ . '/../Helpers');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom($this->getRouteFilePath('admin'));
        $this->loadViewsFrom($this->getViewsPath().'/admin/','Admin');
        $this->loadViewsFrom($this->getViewsPath().'/themes/classimax','Theme');
    }
}
