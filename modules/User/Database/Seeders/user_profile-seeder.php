<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\GenderTypeEnum;

return new class extends Seeder
{
    public function run()
    {
        DB::table('user_profiles')->insert([
            [
                'user_id' => 1,
                'full_name' => 'Full Name',
                'phone' => '998993397707',
                'gender' => GenderTypeEnum::MALE->value,
                'image' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'full_name' => 'Full Name',
                'phone' => '998993397707',
                'gender' => GenderTypeEnum::MALE->value,
                'image' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
};
