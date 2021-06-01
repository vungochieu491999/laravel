<?php

namespace App\Providers;

use App\Support\Helper;
use App\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Helper::autoload(__DIR__ . '/../helpers');
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
    }
}
