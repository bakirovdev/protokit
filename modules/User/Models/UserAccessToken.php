<?php

namespace Modules\User\Models;

use Laravel\Sanctum\PersonalAccessToken;
use Modules\User\Observers\UserAccessTokenObserver;

class UserAccessToken extends PersonalAccessToken
{

    protected $table = 'user_access_tokens';

    protected $casts = [
        'abilities' => 'array',
    ];

    protected static function booted():void
    {
        self::observe([
            UserAccessTokenObserver::class
        ]);
    }

}
