<?php

namespace App\Http\Middleware;

use App\Helpers\RoleHelper;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, \Closure $next): Response
    {
        $role = request()->user()->role;
        if (!$role) abort(401);

        $routePrefix = str_replace('/', '.', request()->route()->getPrefix());
        $routeName = request()->route()->getName();
        $routeName = "$routePrefix.$routeName";
        $routeName = trim($routeName, '.');

        $routes = RoleHelper::routeLists(false);

        if (in_array($routeName, $routes) && !Str::is($role->routes, $routeName)) {
            abort(403, 'You don\'t have role for this action');
        }

        return $next($request);
    }
}
