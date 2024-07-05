<?php

namespace App\Http\Filters;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TaskFilter
{
private array $keys = [
    'status',
    'created_from',
    'created_to'
];


    public function apply(Builder $builder,array $data):Builder
    {
        foreach ($this->keys as $key) {
            if (isset($data[$key]) && method_exists($this, $method = Str::camel($key))) {
                $this->$method($builder, $data[$key]);
            }

        }
        return $builder;
    }


protected function status(Builder $builder, mixed $value): void
{
    $builder->where('status','=',$value);
}

    protected function createdFrom(Builder $builder, mixed $value): void
{
    $builder->where('created_at','>=',$value);
}

    protected function createdTo(Builder $builder, mixed $value): void
{
    $builder->where('created_at','<=',$value);
}


}
