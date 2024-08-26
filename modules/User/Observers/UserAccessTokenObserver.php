<?php

namespace Modules\User\Observers;

use Modules\User\Models\UserAccessToken;

class UserAccessTokenObserver
{
    public function saving(UserAccessToken $model): void
    {
        $model->expires_at = now()->addWeek();
    }


}
