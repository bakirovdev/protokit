<?php

namespace Http\Common\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => [
                'email',
                'required',
                'string',
                'max:225'
            ],
            'password' => [
                'required',
                'string',
                'max:225'
            ]
        ];
    }
}
