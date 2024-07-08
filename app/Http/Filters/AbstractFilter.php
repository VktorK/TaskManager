<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class AbstractFilter
{
    protected $keys = [];
    public function apply(Builder $builder, $data)
    {
        array_walk($this->keys, function($key) use($builder, $data) {
            if(isset($data[$key])){
                $method = \Str::camel($key);

                $this->$method($builder, $data[$key]);
            }
        });

    }
}

