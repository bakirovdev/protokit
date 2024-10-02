<?php

namespace Modules\User\Models;

use App\Base\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable;
use Modules\User\Services\UserService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;

    use SoftDeletes;

    protected $table = 'users';

    protected $hidden = [
        'password',
    ];

    public string $newToken;


    public function getService(): UserService
    {
        return new UserService($this);
    }

    public function profile():HasOne
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    // public function role()

}
