<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public static function index(): Collection
    {
        return Task::all();
    }

    public static function create(array $data)
    {
        return Task::create($data);
    }

    public static function update(Task $task, array $data)
    {
        $task->update($data);
        return $task->fresh();
    }

    public static function destroy(Task $task): ?bool
    {
        return $task->delete();
    }

}
