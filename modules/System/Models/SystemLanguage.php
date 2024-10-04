<?php

namespace Modules\System\Models;

use App\Base\Model;
use Modules\System\Observers\LanguageObserver;

class SystemLanguage extends Model
{
    protected static function booted(): void
    {
        self::observe([
            LanguageObserver::class
        ]);
    }
}
