<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the Task "deleted" event.
     *
     * @param Task $task
     * @return void
     */
    public function deleting(Task $task): void
    {
        $task->update(["status"=> Task::STATUS_DESTROY
        ]);
    }
}
