<?php

namespace Modules\System\Observers;

use Illuminate\Support\Facades\Cache;
use Modules\System\Models\SystemLanguage;

class LanguageObserver
{
    public function saving(SystemLanguage $model): void
    {
        if ($model->getOriginal('is_active') && !$model->is_active) {
            if ($model->is_main) {
                throw new \Exception(__('Can not change main language'));
            }

            if ($model->code === app()->getLocale()) {
                throw new \Exception(__('Can not change current language'));
            }
        }

        if ($model->is_main) {
            $model->is_active = 1;
            $model->newQuery()->where('id', '!=', $model->id)->update(['is_main' => 0]);
        }
    }

    public function saved(SystemLanguage $model): void
    {
        Cache::forget('app_language');
    }

}
