<?php

namespace App\Models\Traits;


    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\App;

trait HasFilter
{
    public function scopeFilter(Builder $builder, $data)
    {

        $class = 'App\Http\Filters\\' . class_basename($this) . 'Filter';
        $filter = App::make($class);
        return $filter->apply($builder, $data);
    }


}
