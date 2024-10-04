<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    protected function localizedRules(): array
    {
        return [];
    }

    protected function nonLocalizedRules(): array
    {
        return [];
    }

    public function rules(): array
    {
        $rules = $this->nonLocalizedRules();

        $localizedRules = $this->localizedRules();
            $languages = array_keys(app('languages')->all);

        foreach ($localizedRules as $key => $rule) {
            foreach ($languages as $language) {
                $rules["$key.$language"] = $rule;
            }
        }
        return $rules;
    }

}
