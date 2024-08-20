<?php

namespace App\Base;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;


class Model extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        $this->mergeGuarded([
            'id',
            'created_at',
            'updated_at',
            'deleted_at'
        ]);

        $this->makeHidden([
            'deleted_at',
        ]);

        if (in_array(SoftDeletes::class, class_uses_recursive($this))) {
            $this->append(['is_delted']);
        }

        parent::__construct($attributes);
    }

    public function getIsDeleteAttribute():bool
    {
        return (bool)$this->deleted_at;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        $format = $this->dateFormat ?? 'Y-m-d H:i:s';
        return $date->format($format);
    }

    public function newEloquentBuilder($query)
    {
        return new QueryBuilder($query);
    }
}
