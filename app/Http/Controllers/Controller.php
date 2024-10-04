<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\User\Models\User;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function successResponse(int $status = 200): JsonResponse
    {
        return response()->json(['message' => 'Success'], $status);
    }

    protected function successResponseWithAccessToken(User $user, int $status = 200): Response
    {
        if (isset($user->newToken) && (!request()->user() || $user->id === request()->user()->id)) {
            return response()->json(['token' => $user->newToken], $status);
        } else {
            return $this->successResponse($status);
        }
    }
}
