<?php

namespace App\Services;

use App\Http\Filters\TaskFilter;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class IndexTaskService
{
    public static function index(array $data): Collection
    {
        $filter = new TaskFilter();
        $tasks = $data['status'] == 2 ? Task::withTrashed() : Task::withoutTrashed();
        return $filter->apply($tasks,$data)->get();
    }
}
