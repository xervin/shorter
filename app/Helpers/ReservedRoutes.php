<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class ReservedRoutes
{
    private const KEY = 'short_routes_';
    private const TTL = 20;
    public static function get()
    {
        return Cache::remember(self::KEY . time(), self::TTL, function () {
            $routes = [];
            foreach (Route::getRoutes() as $route) {
                $routes[] = $route->uri;
            }
            return $routes;
        });
    }
}
