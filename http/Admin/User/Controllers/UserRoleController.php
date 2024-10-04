<?php

namespace Http\Admin\User\Controllers;

use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;
use Http\Admin\User\Requests\UserRoleRequest;
use Modules\User\Models\UserRole;

class UserRoleController extends Controller
{
    public function __construct(private UserRole $model)
    {}

    public function index()
    {
        return RoleHelper::routeLists(false);
    }

    public function store(UserRoleRequest $request)
    {
        return $this->model->create([
            'routes' => $request->routes,
            'name' => $request->name,
        ]);
        return $this->model;

    }
}
