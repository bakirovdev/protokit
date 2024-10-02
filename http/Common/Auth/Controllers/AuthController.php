<?php

namespace Http\Common\Auth\Controllers;

use App\Base\Controller;
use Http\Common\Auth\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (!Auth::guard('web')->attempt($credentials))
            return response()->json(['message' => "Password or email incorrect"], 422);

        request()->user()->getService()->createNewToken();
        return $this->successResponseWithAccessToken(request()->user());
    }
}
