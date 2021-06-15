<?php

namespace App\Facades;

use App\Supports\Dashboard;
use Illuminate\Support\Facades\Facade;

class DashboardFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Dashboard::class;
    }
}
