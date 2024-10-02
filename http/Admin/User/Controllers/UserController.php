<?php

namespace Http\Admin\User\Controllers;

use App\Base\Controller;
use App\Helpers\RoleHelper;

class UserController extends Controller
{
    public function index()
    {
        return RoleHelper::routeLists(false);
    }
}
