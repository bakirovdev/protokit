<?php

namespace Modules\User\Enums;

use App\Base\EnumTrait;

enum GenderTypeEnum: string
{
    use EnumTrait;

    case MALE = 'male';
    case FEMALE = 'female';

    public static function labels(): array
    {
        return [
            self::MALE->value => __('enums.gender.male'),
            self::FEMALE->value => __('enums.gender.female'),
        ];
    }


}
