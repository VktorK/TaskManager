<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TaskFilter extends AbstractFilter
{
    protected $keys = [
        'title',
        'content',
        'status',
        'user_id',
        'created_from',
        'created_to'
    ];


    protected function title(Builder $builder, mixed $value): void
    {
        $builder->where('title', 'like', "%$value%");
    }

    protected function content(Builder $builder, mixed $value): void
    {
        $builder->where('content', 'like', "%$value%");
    }

    protected function status(Builder $builder, mixed $value): void
    {
        $builder->where('status', '=', $value);
    }

    protected function userId(Builder $builder, mixed $value): void
    {
        $builder->where('user_id', '=', $value);
    }

    protected function createdFrom(Builder $builder, mixed $value): void
    {
        $builder->where('created_at', '>=', $value);
    }

    protected function createdTo(Builder $builder, mixed $value): void
    {
        $builder->where('created_at', '<=', $value);
    }


}
