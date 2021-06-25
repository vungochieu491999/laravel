<?php

use App\Facades\PageTitleFacade;
use App\Facades\SettingFacade;
use App\Supports\SettingStore;

if (!function_exists('setting')) {
    /**
     * Get the setting instance.
     *
     * @param $key
     * @param $default
     * @return array|string|null
     */
    function setting($key = null, $default = null)
    {
        if (!empty($key)) {
            try {
                return  (new SettingStore())->get($key, $default);
            } catch (Exception $exception) {
                info($exception->getMessage());
                return $default;
            }
        }

        return SettingFacade::getFacadeRoot();
    }
}

if (!function_exists('page_title')){
    /**
     * return app folder path
     * @param null $path
     * @return string
     */
    function page_title(){
        return PageTitleFacade::getFacadeRoot();
    }
}

if (!function_exists('load_menu_dashboard')){
    /**
     * return app folder path
     * @param null $path
     * @return string
     */
    function load_menu_dashboard(){
        return \App\Facades\DashboardFacade::getFacadeRoot();
    }
}

