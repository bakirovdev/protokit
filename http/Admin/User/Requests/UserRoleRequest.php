<?php

namespace Http\Admin\User\Requests;

use App\Http\Requests\BaseRequest;

class UserRoleRequest extends BaseRequest
{

    public function nonLocalizedRules(): array
    {
        return [
            'routes' => 'required|array',
            'routes.*' => 'required|string',

        ];
    }

    public function localizedRules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
