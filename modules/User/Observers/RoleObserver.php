<?php

namespace Modules\User\Observers;

use App\Helpers\RoleHelper;
use Modules\User\Models\User;
use Modules\User\Models\UserRole;

class RoleObserver
{
    public function saving(UserRole $model): void
    {
        $routes = $model->routes ?? [];
        $availableRouts = RoleHelper::routeLists(false);

        $routeGroups = RoleHelper::groupRoutesByCount($routes);
        $availableRoutGroup = RoleHelper::groupRoutesByCount($availableRouts);

        krsort($routeGroups);

        foreach($routeGroups as $group => $quantity) {
            if ($quantity === $availableRoutGroup[$group]) {
                $routes = array_filter($routes, fn ($value) => !str_starts_with($value, $group));
                $routes[] = "$group.*";
            }
        }

        $routes = array_values($routes);
        sort($routes);

        $model->routes = $routes;

    }

    public function deleting(UserRole $model): void
    {
        if ($model->id === 1) throw new \Exception(__('This item cannot be delete'));

        $user = User::query()->where('role_id', $model->id)->first();

        if ($user) {
            throw new \Exception(__('This item cannot be delete'));
        }
    }

}
