<?php

namespace Modules\User\Services;

use App\Base\Service;

/**
 * @property User $model
 */

class UserService extends Service {

    public function createNewToken(): void
    {
        $token = $this->model
            ->createToken(
                name: 'base',
                abilities: ['*'],
                expiresAt: now()->addWeek(),
            )
            ->plainTextToken;
        $this->model->newToken = "Bearer $token";
    }
}
