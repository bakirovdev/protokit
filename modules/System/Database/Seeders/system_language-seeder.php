<?php

use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

return new class extends Seeder
{
    public function run()
    {
        $languages = config('protokit.languages');

        $data = Arr::map($languages, function ($value, $key) use ($languages) {
            return [
                'name' => $value,
                'code' => $key,
                'image' => null,
                'is_main' => $key === array_key_first($languages),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        });

        DB::table('system_languages')->insert($data);
    }
};
