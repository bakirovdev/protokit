<?php

namespace Http\Admin\User\Controllers;

use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return RoleHelper::routeLists(false);
    }
}
