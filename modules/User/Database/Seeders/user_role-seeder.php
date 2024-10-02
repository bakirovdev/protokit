<?php

use App\Helpers\LocalizeHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\SeederHelper;

return new class extends Seeder
{
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'name' => LocalizeHelper::localizeString('Admin', false),
                'routes' => json_encode([
                    'admin.*',
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => LocalizeHelper::localizeString('Subscriber', false),
                'routes' => json_encode([
                    'subscriber.*',
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
};
