<?php

namespace App\Base;

class Service
{
    public function __construct(protected Model $model)
    {
    }
}
