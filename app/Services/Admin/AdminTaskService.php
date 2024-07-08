<?php

namespace App\Services\Admin;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class AdminTaskService
{
    
    public static function create(array $data)
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
