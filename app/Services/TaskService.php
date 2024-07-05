<?php

namespace App\Services;

use App\Http\Filters\TaskFilter;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public static function index($data): Collection| array
    {
        if(!$data){
            return Task::all();
        } else {
            $filter = app()->make(TaskFilter::class);
            $tasks = $data['status'] == 3 ? Task::withTrashed() : Task::withoutTrashed();
            return $filter->apply($tasks, $data)->get();
        }

    }

    public static function store(array $data)
    {
        return Task::create($data);
    }

    public static function update(Task $task, array $data): ?Task
    {
        $task->update($data);
        return $task->fresh();
    }

    public static function destroy(Task $task): ?bool
    {
        return $task->delete();
    }

}
