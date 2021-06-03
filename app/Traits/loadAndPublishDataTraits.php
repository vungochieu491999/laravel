<?php

namespace App\Traits;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * @mixin ServiceProvider
 */
trait LoadAndPublishDataTraits
{
    /**
     * @var string
     */
    protected $namespace = null;

    /**
     * @var string
     */
    protected $basePath = null;

    /**
     * @param $namespace
     * @return $this
     */
    public function setNamespace($namespace)
    {
        $this->namespace = ltrim(rtrim($namespace, '/'), '/');
        return $this;
    }

    /**
     * @param $path
     * @return $this
     */
    public function setBasePath($path)
    {
        $this->basePath = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath ?? base_path();
    }

    /**
     * Publish the given configuration file name (without extension) and the given module
     * @param $fileNames
     * @return $this
     */
    public function loadAndPublishConfigurations($fileNames)
    {
        if (!is_array($fileNames)) {
            $fileNames = [$fileNames];
        }
        foreach ($fileNames as $fileName) {
            $this->mergeConfigFrom($this->getConfigFilePath($fileName), $this->getDotedNamespace() . '.' . $fileName);
            if ($this->app->runningInConsole()) {
                $this->publishes([
                    $this->getConfigFilePath($fileName) => config_path($this->getDashedNamespace() . '/' . $fileName . '.php'),
                ], 'cms-config');
            }
        }

        return $this;
    }

    /**
     * Publish the given configuration file name (without extension) and the given module
     * @param $fileNames
     * @return $this
     */
    public function loadRoutes($fileNames = ['web'])
    {
        if (!is_array($fileNames)) {
            $fileNames = [$fileNames];
        }
        foreach ($fileNames as $fileName) {
            $this->loadRoutesFrom($this->getRouteFilePath($fileName));
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function loadAndPublishViews()
    {
        $this->loadViewsFrom($this->getViewsPath(), $this->getDashedNamespace());
        if ($this->app->runningInConsole()) {
            $this->publishes([$this->getViewsPath() => resource_path('views/vendor/' . $this->getDashedNamespace())],
                'cms-views');
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function loadAndPublishTranslations()
    {
        $this->loadTranslationsFrom($this->getTranslationsPath(), $this->getDashedNamespace());
        if ($this->app->runningInConsole()) {
            $this->publishes([$this->getTranslationsPath() => resource_path('lang/vendor/' . $this->getDashedNamespace())],
                'cms-lang');
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function loadMigrations()
    {
        $this->loadMigrationsFrom($this->getMigrationsPath());
        return $this;
    }

    /**
     * @param null $path
     * @return $this
     * @deprecated
     */
    public function publishPublicFolder($path = null)
    {
        return $this->publishAssets($path);
    }

    /**
     * @param null $path
     * @return $this
     * @deprecated
     */
    public function publishAssetsFolder()
    {
        return $this->publishAssets();
    }

    /**
     * @param null $path
     * @return $this
     */
    public function publishAssets($path = null)
    {
        if ($this->app->runningInConsole()) {
            if (empty($path)) {
                $path = !Str::contains($this->getDotedNamespace(),
                    'core.') ? 'vendor/core/' . $this->getDashedNamespace() : 'vendor/core';
            }
            $this->publishes([$this->getAssetsPath() => public_path($path)], 'cms-public');
        }

        return $this;
    }

    /**
     * Get path of the give file name in the given module
     * @param string $file
     * @return string
     */
    protected function getConfigFilePath($file)
    {
        return $this->getBasePath() . $this->getDashedNamespace() . '/config/' . $file . '.php';
    }

    /**
     * @param $file
     * @return string
     */
    protected function getRouteFilePath($file)
    {
        return $this->getBasePath() . $this->getDashedNamespace() . '/routes/' . $file . '.php';
    }

    /**
     * @return string
     */
    protected function getViewsPath()
    {
        return $this->getBasePath() . $this->getDashedNamespace() . '/resources/views/';
    }

    /**
     * @return string
     */
    protected function getTranslationsPath()
    {
        return $this->getBasePath() . $this->getDashedNamespace() . '/resources/lang/';
    }

    /**
     * @return string
     */
    protected function getMigrationsPath()
    {
        return $this->getBasePath() . $this->getDashedNamespace() . '/database/migrations/';
    }

    /**
     * @return string
     */
    protected function getAssetsPath()
    {
        return $this->getBasePath() . $this->getDashedNamespace() . '/public/';
    }

    /**
     * @return string
     */
    protected function getDotedNamespace()
    {
        return str_replace('/', '.', $this->namespace);
    }

    /**
     * @return string
     */
    protected function getDashedNamespace()
    {
        return str_replace('.', '/', $this->namespace);
    }
}
