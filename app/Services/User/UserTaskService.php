<?php

namespace App\Services\User;

use App\Http\Filters\TaskFilter;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class UserTaskService
{
    public static function index($data): Collection| array
    {
        if(!$data or $data['status'] != 3){
            $tasks = Task::where('user_id',auth()->id())
                ->where('status',$data['status']);
        } else {
            $tasks = Task::withTrashed();
        }
        $filter = app()->make(TaskFilter::class);
        return $filter->apply($tasks, $data)->get();
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
