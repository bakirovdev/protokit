<?php

namespace App\Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class RoleHelper {

    private static array $excludeRoutes = [
        //telescope routes that doest demend role
        'telescope',
        'telescope.*',
        //sanctum routes that doest demend role
        'sanctum',
        'sanctum.*',
    ];

    public static function routeLists(bool $filteredUser): array
    {
        $role ??= request()->user()->role ?? null;

        $routes = Route::getRoutes()->getRoutes();

        $routeArray = array_map(function ($route) {

            $routePrefix = str_replace('/', '.', $route->getPrefix());
            $routeName = $route->getName();
            $routeName = "$routePrefix.$routeName";
            $routeName = trim($routeName, '.');

            return $routeName;

        }, $routes);

        $routeArray = array_filter($routeArray, function ($value) {
            if (Str::is(self::$excludeRoutes, $value)) return false;
            return true;

        });
        $routeArray = array_values($routeArray);

        return $routeArray;
    }

    public static function groupRoutesByCount(array $routes): array
    {
        $result = [];

        foreach ($routes as $route) {
            $matches = explode('.', $route);

            $fullMatch = [];

            foreach ($matches as $match) {
                $fullMatch[] = $match;
                $key = implode('.', $fullMatch);

                $result[$key] ??= 0;
                $result[$key]++;
            }

        }

        $result = array_filter($result, fn ($value) => $value > 1);

        return $result;
    }

    public static function routesTree(bool $filteredUser): array
    {
        $result = self::routeLists($filteredUser);
        $result = array_combine($result, $result);
        $result = Arr::undot($result);
        return $result;
    }
}
